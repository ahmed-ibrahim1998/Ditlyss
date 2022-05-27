<?php

namespace Modules\Vendor\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Vendor\Entities\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Category::orderBy('id', 'desc'))
                ->editColumn('is_featured', function ($cat) {
                return $cat->is_featured ? '<spane class="badge badge-success">Yes</spane >' : '<spane class="badge badge-danger">No</spane>';
                })->editColumn('name', function ($cat) {
                    return $cat->name;
                })->addColumn('logo', function ($cat) {
                    return '<div class="symbol symbol-75px"><img class="symbol-label" src="' . $cat->getFirstMediaUrl('logo') . '"></div>';
                })->addColumn('actions', function ($cat) {
                    return '<div class="d-flex">' .
                        '<a class="btn btn-info mr-1" href="' . route('category.edit', $cat) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteVendor(event)" action="' . route('category.destroy', $cat) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions', 'logo','is_featured'])->make(true);
        }
        return view('vendor::category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor::category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['is_featured'] = $request['is_featured'] ?? 0;

        $request->validate([
            'name' => 'required',
            'is_featured'=>'required'
        ]);
        $cat = Category::create($request->all());
        if ($request->hasFile('logo'))
            $cat->addMediaFromRequest('logo')->toMediaCollection('logo');
        toast(trans('vendor::messages.created-successfully'), 'success');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('vendor::category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $request['is_featured'] = $request['is_featured'] ?? 0;
        $request->validate([
            'name' => 'required',
            'is_featured' => 'required'
        ]);

        $category->update($request->all());
        if ($request->hasFile('logo'))
            $category->addMediaFromRequest('logo')->toMediaCollection('logo');
        toast(trans('vendor::messages.updated-successfully'), 'success');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        toast(trans('vendor::messages.deleted-successfully'), 'success');
        return back();
    }
}
