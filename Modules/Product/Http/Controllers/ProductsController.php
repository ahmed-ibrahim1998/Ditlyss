<?php

namespace Modules\Product\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Entities\ProductAttribute;
use Modules\Product\Entities\ProductAttributeChoise;
use Modules\Product\Http\Requests\StoreProductsRequest;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Product::withoutGlobalScope('active')->with(['productAttributes'])->orderBy('id', 'desc'))
                ->editColumn('is_active', function ($product) {
                    return $product->is_active ? '<spane class="badge badge-success">Active</spane >' : '<spane class="badge badge-danger">Inactive</spane>';
                })->editColumn('name', function ($product) {
                    return $product->name;
                })->editColumn('cat_id', function ($product) {
                    return $product->category->name;
                })->editColumn('branch_id', function ($product) {
                    return $product->branch->name ?? '';
                })->addColumn('photo', function ($product) {
                    return '<div class="symbol symbol-75px"><img class="symbol-label" src="' . $product->getFirstMediaUrl('products') . '"></div>';
                })->addColumn('actions', function ($product) {
                    return '<div class="d-flex">' .
                        '<a class="btn btn-primary mr-1" href="' . route('products.show', $product) . '"><i class="fa fa-eye"></i></a>' .
                        '<a class="btn btn-info mr-1" href="' . route('products.edit', $product) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteVendor(event)" action="' . route('products.destroy', $product) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions', 'is_active', 'photo'])->make(true);
        }
        return view('product::products.index');
    }

    public function create()
    {
        return view('product::products.create');
    }


    public function store(StoreProductsRequest $request)
    {

        $product = Product::create($request->all());

        if (!empty($request->attributes)) {
            foreach ($request->attributes as $attribute) {
                $atr = $product->attributes()->create([
                    'name' => $attribute['name'],
                    'type' => $attribute['type'],
                    'min' => $attribute['min'],
                    'max' => $attribute['max'],

                ]);
                foreach ($attribute['choices'] as $choice) {
                    $atr->choices()->create([
                        'name' => $choice['name'],
                        'additional_price' => $choice['additional_price'],
                    ]);
                }
            }
        }
        if ($request->logo) {
            $product->addMediaFromRequest('logo')->toMediaCollection('products');
        }

        Alert::success(__('product::messages.created-successfully'));
        return redirect()->route('products.index');
    }


    public function show($id)
    {
        return view('product::products.show');
    }

    public function edit(Product $product)
    {
        return view('product::products.edit', compact('product'));
    }


    public function update(StoreProductsRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        if ($request->hasFile('photo')) {
            $product->addMediaFromRequest('photo')->toMediaCollection('products');
        }
        foreach ((array)$request['attributes'] as $attribute) {
            // Store Attribute
            $product_attribute = ProductAttribute::create(['product_id' => $product->id]);
            // Attribute Translates
            foreach ($attribute['attribute']['translates'] as $attr_trans) {
                $product_attribute->translates()->create($attr_trans);
            }

            // Store Attribute Choices
            foreach ((array)$attribute['choices'] as $choice) {
                $db_choice = ProductAttributeChoise::create([
                    'additional_price' => $choice['additional_price'],
                    'product_attribute_id' => $product_attribute->id
                ]);
                // Choices Translates
                foreach ($choice['translates'] as $choice_trans) {
                    $db_choice->translates()->create($choice_trans);
                }
            }
        }
        Alert::success(__('product::messages.updated-successfully'));
        return redirect()->route('products.index');
    }


    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        Alert::success(__('product::messages.deleted-successfully'));
        return back();
    }
}
