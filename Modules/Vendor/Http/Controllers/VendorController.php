<?php

namespace Modules\Vendor\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Vendor\Entities\Vendor;
use View;
use Yajra\DataTables\Facades\DataTables;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Vendor::orderBy('id', 'desc'))
                ->editColumn('is_active', function ($vendor) {
                    return $vendor->is_active ? '<spane class="badge badge-success">Yes</spane >' : '<spane class="badge badge-danger">No</spane>';
                })->editColumn('name', function ($vendor) {
                    return $vendor->name;
                })->addColumn('logo', function ($vendor) {
                    return '<div class="symbol symbol-75px"><img class="symbol-label" src="' . $vendor->getFirstMediaUrl('logo') . '"></div>';
                })->editColumn('is_featured', function ($vendor) {
                return $vendor->is_featured ? '<spane class="badge badge-success">Yes</spane >' : '<spane class="badge badge-danger">No</spane>';
                })->addColumn('categories', function ($vendor) {
                    $html = '';
                    foreach ($vendor->categories as $item) {
                        $html .= '<spane class="badge badge-success d-inline m-1">' . $item->name . '</spane >';
                    }
                    return $html;
                })->addColumn('actions', function ($vendor) {
                    return '<div class="d-flex">' .
                        '<a class="btn btn-primary mr-1" href="' . route('vendor.show', $vendor) . '"><i class="fa fa-eye"></i></a>' .
                        '<a class="btn btn-info mr-1" href="' . route('vendor.edit', $vendor) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteVendor(event)" action="' . route('vendor.destroy', $vendor) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions', 'categories','is_featured', 'is_active', 'logo'])->make(true);
        }
        return view('vendor::vendors.index');
    }


    public function create()
    {
        return view('vendor::vendors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name.*' => 'required',
            'commission' => 'required',
            'users' => 'required|array',
            'methods' => 'required|array'
        ]);
        $request['is_active'] ?? 0;
        $request['is_featured'] ?? 0;

        $vendor = Vendor::create($request->all());
        foreach ($request['users'] as $index => $user) {
            $vendor->users()->attach([
                $user => [
                    'branch_id' => $request['branches'][$index]
                ]
            ]);
        }
        $vendor->paymentMethods()->sync($request['methods']);
        if ($request->hasFile('logo')) {
            $vendor->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        $vendor->categories()->sync($request['categories']);

        toast(__('vendor::messages.created-successfully'), 'success');
        return redirect()->route('vendor.index');
    }

    /**
     * Show the specified resource.
     * @param Vendor $vendor
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function show(Vendor $vendor)
    {
        $vendor->load('users');
        return view('vendor::vendors.show', compact('vendor'));
    }


    public function edit(Vendor $vendor)
    {
        $users = [];
        foreach ((array)$vendor->users as $user) {
            $users[] = [
                'user_id' => $user->id,
                'branch_id' => $user->pivot->branch_id,
            ];
        }
        return view('vendor::vendors.edit', compact('vendor', 'users'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name.*' => 'required',
            'commission' => 'required',
            'methods' => 'required|array'

        ]);
        $request['is_active'] ?? 0;
        $request['is_featured'] ?? 0;
        $vendor->update($request->all());
        $vendor->users()->sync([]);
        foreach ($request['users'] as $index => $item) {
            if ($item)
                $vendor->users()->attach([
                    $item => [
                        'branch_id' => $request['branches'][$index]
                    ]
                ]);
        }
        $vendor->paymentMethods()->sync($request->input('methods'));
        $vendor->categories()->sync($request['categories']);

        if ($request->hasFile('logo')) {
            $vendor->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        toast(__('vendor::messages.updated-successfully'), 'success');
        return redirect()->route('vendor.index');

    }

    /**
     * Remove the specified resource from storage.
     * @param Vendor $vendor
     * @return RedirectResponse
     */
    public function destroy(Vendor $vendor): RedirectResponse
    {
        $vendor->delete();
        toast(__('vendor::messages.deleted-successfully'), 'success');
        return back();
    }
}
