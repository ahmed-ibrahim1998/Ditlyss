<?php

namespace Modules\Locations\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Locations\Entities\City;
use Modules\Locations\Entities\Country;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use voku\helper\ASCII;
use Yajra\DataTables\DataTables;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(City::orderBy('id', 'desc'))
                ->editColumn('name', function (City $city) {
                    return $city->name;
                })->editColumn('country_id', function (City $city) {
                    return $city->country->name;
                })->addColumn('areas_count', function (City $city) {
                    return $city->areas()->count();
                })->addColumn('actions', function (City $city) {
                    return
                        '<div class="d-flex">' .
                        '<a class="btn btn-info mr-1" href="' . route('cities.edit', $city) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteVendor(event)" action="' . route('cities.destroy', $city) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions', 'status_id'])->make(true);
        }
        return view('locations::cities.index');
    }

    public function create()
    {
        return view('locations::cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name.ar' => 'required',
            'name.en' => 'required',
            'country_id' => 'required',
        ]);
        City::create($request->all());
        toast(trans('locations::messages.created-successfully'), 'success')->autoClose(1000);
        return redirect()->route('cities.index');
    }

    public function edit(City $city)
    {
        return view('locations::cities.edit', compact('city'));
    }

    public function update(Request $request, City $city): RedirectResponse
    {
        $request->validate([
            'name.ar' => 'required',
            'name.en' => 'required',
            'country_id' => 'required',
        ]);
        $city->update($request->all());
        toast(trans('locations::messages.updated-successfully'), 'success')->autoClose(1000);
        return redirect()->route('cities.index');
    }

    public function destroy(City $city)
    {
        $city->delete();
        toast(trans('locations::messages.deleted-successfully'), 'success')->autoClose(1000);
        return back();
    }
}
