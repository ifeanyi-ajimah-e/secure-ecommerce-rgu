<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-roles-and-permissions', Auth::user() );

        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('manage-roles-and-permissions', Auth::user() );

        $this->validate($request, [
            'name' => 'required|string|max:80|unique:roles',
            'description' => 'nullable|string',
            'permissions.*' => 'required',
        ]);

        $data = $request->except(['_token']);
        $role = Role::create($data);
        if($request->permissions){
            $role->permissions()->attach($request->permissions);
        }

        Alert::success('Success', 'Role Added Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->authorize('manage-roles-and-permissions', Auth::user() );

        $this->validate($request, [
            'name' => 'required|string|max:80|unique:roles,name,'.$id,
            'description' => 'nullable|string',
        ]);
        $role = Role::find($id);
        $data = $request->except(['_token']);
        $role->update($data);
        $role->permissions()->sync($request->permissions);
        Alert::success('Success', 'Role Updated');
        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
