<?php

namespace Modules\Vendor\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Vendor\Entities\Branch;
use Yajra\DataTables\Facades\DataTables;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Branch::with(['area', 'cuisines'])->orderBy('id', 'desc'))
                ->editColumn('is_active', function ($branch) {
                    return $branch->is_active ? '<spane class="badge badge-success">Open</spane >' : '<spane class="badge badge-danger">Close</spane>';
                })->editColumn('is_featured', function ($branch) {
                    return $branch->is_featured ? '<spane class="badge badge-success">Yes</spane >' : '<spane class="badge badge-danger">No</spane>';
                })->editColumn('name', function ($branch) {
                    return $branch->name;
                })->editColumn('vendor_id', function ($branch) {
                    return $branch->vendor->name ?? '';
                })->editColumn('area_id', function ($branch) {
                    return $branch->area->name ?? '';
                })->addColumn('actions', function ($branch) {
                    return '<div class="d-flex">' .
                        '<a class="btn btn-primary mr-1" href="' . route('branch.show', $branch) . '"><i class="fa fa-eye"></i></a>' .
                        '<a class="btn btn-info mr-1" href="' . route('branch.edit', $branch) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteVendor(event)" action="' . route('branch.destroy', $branch) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions', 'is_active', 'is_featured', 'cuisines'])->make(true);
        }
        return view('vendor::branches.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public
    function create()
    {
        return view('vendor::branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public
    function store(Request $request)
    {
        $request->validate([
            'name.*' => 'required',
            'vendor_id' => 'required',
            'area_id' => 'required',
            'cuisines' => 'required',
        ]);
        $request['is_active'] = $request['is_active'] ?? 'close';
        $request['is_featured'] = $request['is_featured'] ?? 0;
        $branch = Branch::create($request->all());
        $branch->cuisines()->sync($request['cuisines']);
        foreach ($request['areas'] as $index => $area) {
            $branch->delivery_areas()->attach([
                $area => [
                    'min_charge' => $request['min_charge'][$index],
                    'delivery_fees' => $request['delivery_fees'][$index],
                ]
            ]);
        }

        toast(__('vendor::messages.created-successfully'), 'success');
        return redirect()->route('branch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Branch $branch
     * @return Response
     */
    public
    function show(Branch $branch)
    {
        $branch->load('delivery_areas');
        return \view('vendor::branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Branch $branch
     * @return Response
     */
    public
    function edit(Branch $branch)
    {
        $branch->load('delivery_areas');
        $areas = [];
        foreach ($branch->delivery_areas as $area) {
            $areas[] = [
                'area_id' => $area->id,
                'min_charge' => $area->pivot->min_charge,
                'delivery_fees' => $area->pivot->delivery_fees,
            ];
        }
        return \view('vendor::branches.edit', compact('branch', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Branch $branch
     * @return Response
     */
    public
    function update(Request $request, Branch $branch)
    {
        $request['is_active'] = $request['is_active'] ?? 'close';
        $request['is_featured'] = $request['is_featured'] ?? 0;
        $branch->update($request->all());
        $branch->delivery_areas()->sync([]);
        foreach ($request['areas'] as $index => $area) {
            $branch->delivery_areas()->attach([
                $area => [
                    'min_charge' => $request['min_charge'][$index],
                    'delivery_fees' => $request['delivery_fees'][$index],
                ]
            ]);
        }
        toast(trans('settings::messages.updated-successfully'), 'success');
        return redirect()->route('branch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Branch $branch
     * @return Response
     */
    public
    function destroy(Branch $branch)
    {
        $branch->delete();
        toast(trans('vendor::messages.deleted-successfully'), 'success');
        return redirect()->back();
    }
}
