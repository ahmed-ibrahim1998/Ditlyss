<?php

namespace Modules\Order\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Entities\OrderStatus;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $order_statuses = OrderStatus::paginate(10);
        $languages = Language::all();
        $statuses = [
            'bg-success'        => __('order::cruds.green'),
            'bg-danger'         => __('order::cruds.red'),
            'bg-info'           => __('order::cruds.purple'),
            'bg-primary'        => __('order::cruds.skyblue'),
            'bg-warning'        => __('order::cruds.yellow')
        ];
        return view('order::status.index', compact('order_statuses', 'languages', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('order::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $order_status = OrderStatus::create([
            'name'  => $request->only('ar', 'en'),
            'color' => $request->color
        ]);
        Alert::success(__('order::messages.created-successfully'));
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('order::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('order::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $order_status = OrderStatus::findOrFail($id);
        $order_status->delete();
        Alert::success(__('order::messages.deleted-successfully'));
        return back();
    }
}
