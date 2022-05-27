<?php

namespace Modules\Locations\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Locations\Entities\Area;
use Modules\Locations\Entities\City;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Modules\Locations\Http\Requests\StoreAreaRequest;
use Yajra\DataTables\DataTables;

class AreasController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Area::with('city.country')->orderBy('id', 'desc'))
                ->editColumn('name', function (Area $area) {
                    return $area->name;
                })->addColumn('related_to', function (Area $area) {
                    return $area->city->name . ', ' . $area->city->country->name;
                })->addColumn('actions', function (Area $area) {
                    return
                        '<div class="d-flex">' .
                        '<a class="btn btn-info mr-1" href="' . route('areas.edit', $area) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteVendor(event)" action="' . route('areas.destroy', $area) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions', 'status_id'])->make(true);
        }
        return view('locations::areas.index');
    }

    public function create()
    {
        return view('locations::areas.create');
    }

    public function store(StoreAreaRequest $request): RedirectResponse
    {
        Area::create($request->all());
        toast(trans('locations::messages.created-successfully'), 'success')->autoClose(1000);
        return redirect()->route('areas.index');
    }

    public function edit(Area $area)
    {
        return view('locations::areas.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
            'name.ar' => 'required',
            'name.en' => 'required',
            'city_id' => 'required',
            'delivery_fees' => 'required',
        ]);
        $area->update($request->all());
        toast(trans('locations::messages.updated-successfully'), 'success')->autoClose(1000);
        return redirect()->route('areas.index');
    }


    public function destroy(Area $area): RedirectResponse
    {
        $area->delete();
        toast(trans('locations::messages.deleted-successfully'), 'success')->autoClose(1000);
        return back();
    }
}
