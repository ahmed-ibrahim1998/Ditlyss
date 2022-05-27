<?php

namespace Modules\Client\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Locations\Entities\Country;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Modules\Client\Http\Requests\StoreClientRequest;
use Modules\Client\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('client::clients.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $countries = Country::all();
        return view('client::clients.create-edit', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreClientRequest $request)
    {

//        User::create($request->all());
//        Alert::success(trans('client::messages.created-successfully'));
//        return \redirect()->back();

        $client = new User();
        $client->name = $request->name;
        $client->password = bcrypt($request->password);
        $client->email = $request->email;
        $client->phone = $request->number_prefix . $request->phone;
        $client->age = $request->age;
        $client->height = $request->height;
        $client->weight = $request->weight;
        $client->physical_activity = $request->physical_activity;
        $client->notes = $request->notes;
        if ($file = $request->file('profile_photo_path')) {
            $name = 'media/images/profile-pictures/profile-picture-' . time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move('media/images/profile-pictures', $name);
            $client->profile_photo_path = $name;
        }
        $client->save();
        $client->assign('client');
        Alert::success(__('admin::messages.created-successfully'));
        return redirect()->route('all-clients.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('client::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $client = User::findOrFail($id);
        $countries = Country::all();
        return view('client::clients.create-edit', compact('countries', 'client'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateClientRequest $request, $id /*User $user*/)
    {

//        $user->update($request->all());
//        Alert::success(trans('order::messages.updated-successfully'));
//        return \redirect()->route('client.index');

        $client = User::findOrFail($id);
        $client->name = $request->name;
        $client->password = bcrypt($request->password);
        $client->email = $request->email;
        $client->age = $request->age;
        $client->height = $request->height;
        $client->weight = $request->weight;
        $client->physical_activity = $request->physical_activity;
        $client->notes = $request->notes;
        $client->email = $request->email;
        $client->phone = $request->number_prefix . $request->phone;
        if ($file = $request->file('profile_photo_path')) {
            $name = 'media/images/profile-pictures/profile-picture-' . time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move('media/images/profile-pictures', $name);
            $client->profile_photo_path = $name;
        }
        $client->save();
        Alert::success(__('admin::messages.updated-successfully'));
        return redirect()->route('all-clients.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success(__('client::messages.deleted-successfully'));
        return back();

//        $order->delete();
//        Alert::success(trans('client::messages.deleted-successfully'));
//        return Redirect::back();
    }
}
