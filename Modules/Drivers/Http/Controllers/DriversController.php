<?php

namespace Modules\Drivers\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Drivers\Entities\Driver;
use Modules\Drivers\Entities\Vehicle;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Modules\Drivers\Http\Requests\DriversRequest;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers::drivers.index',compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $users = User::all();
        $vehicles = Vehicle::all();
        return view('drivers::drivers.create',compact('users', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(DriversRequest $request)
    {

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        $user->assign('driver');

        $driver = new Driver();

        /**
         * To Be Refactored
         */
        if($request->status)
            $driver->status = 1;
        else
            $driver->status = 0;

        $driver->user_id = $user->id;
        $driver->lat = $request->lat;
        $driver->long = $request->long;
        $driver->subscription_type = $request->subscription_type;
        $driver->subscription_value = $request->subscription_value;
        $driver->vehicle_id = $request->vehicle_id;
        $driver->civil_id = $request->civil_id;


        if($file = $request->file('profile_pic')){
            $name = str_replace(' ' , '_' ,time() . '_' . $file->getClientOriginalName()) ;
            $file->move('media/images/drivers', $name);
            $driver->profile_pic = $name;
        }
        $driver->save();
        Alert::success(__('ads::messages.created-successfully'));

        return redirect()->route('drivers.index');
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

        $driver = Driver::find($id);
        $vehicles = Vehicle::all();

        return view('drivers::drivers.edit' , compact('driver' , 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(DriversRequest $request, $id)
    {
        //
        $driver = Driver::find($id);

        if($request->status)
            $driver->status = 1;
        else
            $driver->status = 0;

        $driver->lat = $request->lat;
        $driver->long = $request->long;
        $driver->subscription_type = $request->subscription_type;
        $driver->subscription_value = $request->subscription_value;
        $driver->vehicle_id = $request->vehicle_id;
        $driver->civil_id = $request->civil_id;

        if($file = $request->file('profile_pic')){
            $name =str_replace(' ' , '_' ,time() . '_' . $file->getClientOriginalName()) ;
            $file->move('media/images/drivers', $name);
            $driver->profile_pic = $name;
        }



        $driver->save();

        $user = User::find($driver->user_id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('drivers.edit' , $id);
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
