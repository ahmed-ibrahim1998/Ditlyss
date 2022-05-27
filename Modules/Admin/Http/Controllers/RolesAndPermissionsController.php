<?php

namespace Modules\Admin\Http\Controllers;

use Bouncer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;
use Illuminate\Routing\Controller;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Http\Requests\StoreRoleRequest;

class RolesAndPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles = Role::with('abilities')->get();
        return view('admin::roles.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreRoleRequest $request)
    {
        Role::create([
            'name' => $request->name,
            'title' => $request->title,
        ]);
        Alert::success(__('admin::messages.created-successfully'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return response()->json([
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        Alert::success(__('admin::messages.updated-successfully'));
        return redirect()->route('roles-and-permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        Alert::success(__('admin::messages.deleted-successfully'));
        return back();
    }


    /**
     * Show Permissions Page
     */
    public function showPermissions($roleName)
    {
        $role = Role::whereName($roleName)->firstOrFail();
        $modules = Module::allEnabled();
        $entities = [];
        foreach ($modules as $name => $module) {
            foreach (File::files(base_path('Modules/' . $name . '/Entities')) as $file) {
                $entities[] = Str::substr($file->getFileName(), 0, -4);
            }
        }
        return view('admin::roles.permissions', compact('role', 'entities'));
    }


    /**
     * Save Abilities To Role
     */
    public function savePermissions(Request $request, $roleName)
    {
        $role = Role::whereName($roleName)->firstOrFail();
        if ($role->abilities()->count() > 0) {
            $role->abilities()->delete();
        }
        foreach ($request->abilities as $ability) {
            Bouncer::allow($role)->to($ability);
        }
        Alert::success(__('admin::messages.created-successfully'));
        return redirect()->route('roles-and-permissions.index');
    }
}
