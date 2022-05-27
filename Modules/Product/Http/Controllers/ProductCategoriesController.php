<?php

namespace Modules\Product\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Http\Requests\StoreProductCategoryRequest;
use Modules\Product\Http\Requests\UpdateProductCategoryRequest;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(ProductCategory::with(['products'])->orderBy('id', 'desc'))
                ->editColumn('is_active', function ($cat) {
                    return $cat->is_active ? '<spane class="badge badge-success">Yes</spane >' : '<spane class="badge badge-danger">No</spane>';
                })->editColumn('is_featured', function ($cat) {
                    return $cat->is_featured ? '<spane class="badge badge-success">Yes</spane >' : '<spane class="badge badge-danger">No</spane>';
                })->editColumn('name', function ($cat) {
                    return $cat->name;
                })->addColumn('photo', function ($cat) {
                    return '<div class="symbol symbol-75px"><img class="symbol-label" src="' . $cat->getFirstMediaUrl('product-category') . '"></div>';
                })->addColumn('count', function ($cat) {
                    return '<spane class="badge badge-success">' . $cat->products->count() . '</spane>';
                })->addColumn('actions', function ($cat) {
                    return '<div class="d-flex">' .
                        '<a class="btn btn-info mr-1" href="' . route('product-category.edit', $cat) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteItem(event)" action="' . route('product-category.destroy', $cat) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions', 'is_active','is_featured', 'photo', 'count'])->make(true);
        }
        return view('product::categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('product::categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $request['is_active'] = $request['is_active'] ?? 0;
        $request['is_featured'] = $request['is_featured'] ?? 0;
        $category = ProductCategory::create($request->all());
        if ($request->hasFile('logo')) {
            $category->addMediaFromRequest('logo')->toMediaCollection('product-category');
        }
        Alert::success(__('product::messages.created-successfully'));
        return redirect()->route('product-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param ProductCategory $productCategory
     * @return Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductCategory $productCategory
     * @return Response
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('product::categories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ProductCategory $productCategory
     * @return Response
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->all());
        if ($request->hasFile('logo')) {
            $productCategory->addMediaFromRequest('logo')->toMediaCollection('product-category');
        }
        Alert::success(__('product::messages.updated-successfully'));
        return redirect()->route('product-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductCategory $productCategory
     * @return Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        Alert::success(__('product::messages.deleted-successfully'));
        return back();
    }
}
