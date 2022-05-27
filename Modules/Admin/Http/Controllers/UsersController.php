<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Http\Requests\StoreUserRequest;
use Modules\Admin\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $users = User::filter($request->all())->paginate(10);
        $roles = Role::pluck('title', 'name');
        return view('admin::users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $roles = Role::pluck('title', 'name');
        return view('admin::users.create-edit', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        if($file = $request->file('profile_photo_path')) {
            $name = 'media/images/profile-pictures/profile-picture-' . time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move('media/images/profile-pictures', $name);
            $user->profile_photo_path = $name;
        }
        $user->save();
        $user->assign($request->role);
        Alert::success(__('admin::messages.created-successfully'));
        return redirect()->route('users.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('title', 'name');
        return view('admin::users.create-edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        if($file = $request->file('profile_photo_path')) {
            File::delete($user->profile_photo_path);
            $name = 'media/images/profile-pictures/profile-picture-' . time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move('media/images/profile-pictures', $name);
            $user->profile_photo_path = $name;
        }
        $user->save();
        $user->assign($request->role);
        Alert::success(__('admin::messages.created-successfully'));
        return redirect()->route('users.index');
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
        Alert::success(__('admin::messages.deleted-successfully'));
        return back();
    }


    public function userFilteration(Request $request) 
    {
        // Define Array
        $par = [];
        // Hna bageb koll elly gy mn el request m3ada el CSRF Token
        foreach ($request->except('_token') AS $v => $req) {
            if ($req != null)
                $par[$v] = $req;
        }
        return redirect()->route('users.index', $par);
    }
}
