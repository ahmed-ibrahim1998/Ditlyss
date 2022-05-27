<?php

namespace Modules\Drivers\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Drivers\Entities\Vehicle;
use Modules\Drivers\Http\Requests\VehiclesRequest;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('drivers::vehicles.index' , compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('drivers::vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(VehiclesRequest $request)
    {
        //
        $vehicle = new Vehicle();

        $vehicle->plate_number = $request->plate_number;
        $vehicle->licence_expired_at = $request->licence_expired_at;
        $vehicle->save();

        return redirect()->route('vehicles.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('drivers::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $vehicle  = Vehicle::find($id);
        return view('drivers::vehicles.edit' , compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(VehiclesRequest $request, $id)
    {
        //

        $vehicle = Vehicle::find($id);

        $vehicle->plate_number = $request->plate_number;
        $vehicle->licence_expired_at = $request->licence_expired_at;
        $vehicle->save();

        return redirect()->route('vehicles.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
