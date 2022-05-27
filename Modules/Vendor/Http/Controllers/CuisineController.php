<?php

namespace Modules\Vendor\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Vendor\Entities\Cuisine;
use Yajra\DataTables\Facades\DataTables;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Cuisine::orderBy('id', 'desc'))
                ->editColumn('name', function ($cuisine) {
                    return $cuisine->name;
                })->addColumn('actions', function ($branch) {
                    return '<div class="d-flex">' .
                        '<a class="btn btn-info mr-1" href="' . route('cuisine.edit', $branch) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteVendor(event)" action="' . route('cuisine.destroy', $branch) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions'])->make(true);
        }
        return view('vendor::cuisines.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor::cuisines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Cuisine::create($request->all());
        toast(trans('vendor::messages.created-successfully'), 'success');
        return redirect()->route('cuisine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function show(Cuisine $cuisine)
    {
        return view('vendor::cuisines.show', compact('cuisine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuisine $cuisine)
    {
        return view('vendor::cuisines.edit', compact('cuisine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuisine $cuisine)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $cuisine->update($request->all());
        toast(trans('vendor::messages.updated-successfully'), 'success');
        return redirect()->route('cuisine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuisine $cuisine)
    {
        $cuisine->delete();
        toast(trans('vendor::messages.deleted-successfully'), 'success');
        return back();
    }
}
