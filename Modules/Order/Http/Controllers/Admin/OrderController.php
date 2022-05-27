<?php

namespace Modules\Order\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Modules\Order\Entities\Order;
use Illuminate\Routing\Controller;
use Modules\Locations\Entities\Area;
use Modules\Locations\Entities\City;
use Illuminate\Http\RedirectResponse;
use Modules\Locations\Entities\Country;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Order\Http\Requests\OrderCreateRequest;
use Modules\Order\Http\Requests\OrderUpdateRequest;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Order::with(['customer', 'status', 'branch', 'driver'])->orderBy('id', 'desc'))
                ->editColumn('client_id', function ($order) {
                    return $order->customer->name ?? '';
                })->addColumn('vendor', function ($order) {
                    return $order->branch->vendor->name ?? '';
                })->addColumn('address', function ($order) {
                    return $order->address ?? '';
                })->editColumn('driver_id', function ($order) {
                    return $order->driver->name ?? '';
                })->editColumn('branch_id', function ($order) {
                    return $order->branch->name ?? '';
                })->editColumn('status_id', function ($order) {
                    return '<span class="badge ' . $order->status->color . '">' . $order->status->name . '</span>';
                })->addColumn('actions', function ($vendor) {
                    return '<div class="d-flex">' .
                        '<a class="btn btn-primary mr-1" href="' . route('order.show', $vendor) . '"><i class="fa fa-eye"></i></a>' .
                        '<a class="btn btn-info mr-1" href="' . route('order.edit', $vendor) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteVendor(event)" action="' . route('order.destroy', $vendor) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions', 'status_id'])->make(true);
        }
        return view('order::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('order::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param OrderCreateRequest $request
     * @return Redirect
     */
    public function store(OrderCreateRequest $request): Redirect
    {
        Order::create($request->all());
        Alert::success(trans('order::messages.created-successfully'));
        return \redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param Order $order
     * @return View
     */
    public function show(Order $order): View
    {
        return view('order::show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Order $order
     * @return Renderable
     */
    public function edit(Order $order)
    {
        $order->load('branch', 'products');
        return view('order::edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(OrderUpdateRequest $request, Order $order)
    {
        $order->update($request->all());
        Alert::success(trans('order::messages.updated-successfully'));
        return \redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Order $order
     * @return RedirectResponse
     */
    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();
        Alert::success(trans('order::messages.deleted-successfully'));
        return Redirect::back();
    }

    /**
     * Get Cities With AJAX Request
     */
    public function getCountryCities($country_id)
    {
        $cities = City::whereCountryId($country_id)->get();
        return response()->json([
            'cities' => $cities
        ]);
    }

    /**
     * Get Areas With AJAX Request
     */
    public function getCityAreas($city_id)
    {
        $areas = Area::whereCityId($city_id)->get();
        return response()->json([
            'areas' => $areas
        ]);
    }
}
