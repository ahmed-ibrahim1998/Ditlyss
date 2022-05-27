<?php

namespace Modules\Locations\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Locations\Entities\Country;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Modules\Locations\Http\Requests\StoreCountriesRequest;
use Modules\Locations\Http\Requests\UpdateCountriesRequest;
use Yajra\DataTables\DataTables;

class CountryController extends Controller
{

    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Country::all())
                ->editColumn('name', function (Country $country) {
                    return $country->name;
                })->addColumn('actions', function (Country $country) {
                    return
                        '<div class="d-flex">' .
                        '<a class="btn btn-info mr-1" href="' . route('countries.edit', $country) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteVendor(event)" action="' . route('countries.destroy', $country) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions', 'status_id'])->make(true);
        }
        return view('locations::countries.index');
    }


    public function create()
    {
        return view('locations::countries.create');
    }

    public function store(StoreCountriesRequest $request)
    {
        Country::create($request->all());
        Alert::success(__('locations::messages.created-successfully'));
        return redirect()->route('countries.index');
    }

    public function show($id)
    {
        $country = Country::findOrFail($id);
        return view('locations::countries.show', compact('country'));
    }

    public function edit(Country $country)
    {
        return view('locations::countries.edit', compact('country'));
    }

    public function update(UpdateCountriesRequest $request, Country $country): RedirectResponse
    {
        $country->update($request->all());
        Alert::success(__('locations::messages.updated-successfully'));
        return redirect()->route('countries.index');
    }

    public function destroy(Country $country): RedirectResponse
    {
        $country->delete();
        Alert::success(__('locations::messages.deleted-successfully'));
        return back();
    }
}
