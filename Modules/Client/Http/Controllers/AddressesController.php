<?php

namespace Modules\Client\Http\Controllers;

use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Locations\Entities\Area;
use Modules\Locations\Entities\City;
use Modules\Locations\Entities\Country;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Client\Entities\ClientAddress;
use Modules\Client\Http\Requests\StoreAddressRequest;
use Yajra\DataTables\DataTables;

class AddressesController extends Controller
{

    public function index(Request $request)
    {

        if (\request()->ajax()) {
            return DataTables::of(ClientAddress::with('client', 'area.city.country')->orderBy('id', 'desc'))
                ->editColumn('title', function (ClientAddress $address) {
                    return $address->title;
                })->editColumn('client_id', function (ClientAddress $address) {
                    return $address->client->name;
                })->editColumn('area_id', function (ClientAddress $address) {
                    return $address->area->name ?? '' . ", " . $address->area->city->name ?? '' . ', ' . $address->area->city->country->name ?? '';
                })
                ->addColumn('actions', function (ClientAddress $address) {
                    return
                        '<div class="d-flex">' .
                        '<a class="btn btn-info mr-1" href="' . route('addresses.edit', $address) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteVendor(event)" action="' . route('address.destroy', $address) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions'])->make(true);
        }
        return view('client::addresses.index');
    }

    public function create()
    {
        return view('client::addresses.create');
    }


    public function store(StoreAddressRequest $request)
    {
        ClientAddress::create($request->all());
        toast(__('client::messages.created-successfully'), 'success')->autoClose(1000);
        return redirect()->route('addresses.index');
    }


    public function edit(ClientAddress $address)
    {
        return view('client::addresses.edit', compact('address'));
    }

    public function update(StoreAddressRequest $request, ClientAddress $address)
    {
        $address->update($request->all());
        toast(__('client::messages.updated-successfully'), 'success')->autoClose(1000);
        return redirect()->route('addresses.index');
    }


    public function destroy(ClientAddress $address)
    {
        $address->delete();
        Alert::success(__('client::messages.deleted-successfully'));
        return back();
    }

    public function searchClients($searchQuery)
    {
        $clients = User::whereIs('client')->where('email', 'LIKE', '%' . $searchQuery . '%')->orWhere('name', 'LIKE', '%' . $searchQuery . '%')->get();

        if ($clients->isEmpty()) {
            $response = [
                'error' => __('client::messages.no-clients-matched-with-the-entered-query')
            ];
        } else {
            $response = [
                'clients' => $clients
            ];
        }

        return response()->json($response);
    }

    public function getCountryCities($country_id)
    {
        $cities = City::whereCountryId($country_id)->get();
        return response()->json([
            'cities' => $cities
        ]);
    }

    public function getCityAreas($city_id)
    {
        $areas = Area::whereCityId($city_id)->get();
        return response()->json([
            'areas' => $areas
        ]);
    }
}
