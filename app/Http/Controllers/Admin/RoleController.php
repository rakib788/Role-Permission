<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('roles.create', compact('permissions', 'permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation data
        $request->validate([
            'name'=> 'required|max:100|unique:roles'
        ],
        [
            'name.required' => 'Please give me a role name'
        ]
    );


        // Process data
         $role = Role::create(['name'=> $request->name]);
        //  $role = DB::table('roles')->where('name',$request->name)->first();
         $permissions = $request->input('permissions');
         if (!empty($permissions)) {
             $role ->syncPermissions($permissions);

         }
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('roles.edit', compact( 'role','permissions', 'permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Validation data
         $request->validate([
            'name'=> 'required|max:100'
        ],
        [
            'name.required' => 'Please give me a role name'
        ]
    );


        // Process data
         $role = Role::findById($id);
        //  $role = DB::table('roles')->where('name',$request->name)->first();
         $permissions = $request->input('permissions');
         if (!empty($permissions)) {
             $role ->syncPermissions($permissions);

         }
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
