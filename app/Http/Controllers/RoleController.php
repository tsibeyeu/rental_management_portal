<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{



    function index() {
        $roles=Role::all();
      return  view('admin.roles.index',compact('roles'));
        
    }




    function create()  {
      return view('admin.roles.create');
      
    }



    function store(Request $request )  {
      $validated=$request->validate(['name'=>'required']);
      Role::create($validated);
      return redirect()->route('admin.roles.index');
      
    }




    function edit (Role $role)  {
      $permissions=Permission::all();
      return view('admin.roles.edit',compact('role','permissions'));
      
  }



  function update(Request $request,Role $role) {
  $validated=$request->validate(['name'=>'required']);
  $role->update($validated);
  return redirect()->route('admin.roles.index');
      
  }



  function destroy(Role $role) {
    $role->delete();
  return redirect()->route('admin.roles.index');
  
  }
  
  
  function showRolePermission(Role $role)  {
    // $permissions=Permission::all();
    // $rolePermissions = $role->permissions->pluck('id')->all();
    $roleId=$role->id;
    $permissionsNotInRoles=Permission::whereDoesntHave('roles',function($query) use ($roleId){
      $query->where('id',$roleId);
    })->get();

    $permissions = $role->permissions->all();
    $rolepermissionsCollection = collect($permissions);


    // $rolePermissions=DB::table('role_has_permissions')
    //                     ->where('role_has_permissions.role_id',$role->id)
    //                     ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
    //                     ->all();
    return view('admin.roles.role-permission',compact('role','permissions','rolepermissionsCollection','permissionsNotInRoles'));
  }




  function givePermission(Request $request,Role $role) {
    // if ($role->hasPermissionTo($request->permissions)) {
    //   return redirect()->back()->with(['success'=> 'Permission exist .']);
    // }
    $role->givePermissionTo($request->permissionsNotInRoles);
    // $role->syncPermissions($request->permissions);
      return redirect()->back()->with(['success'=> 'Permission assigned successfully.']);
    
    
  }



  function revokePermission(Role $role,Permission $permission)  {
    if ($role->hasPermissionTo($permission)) {
      $role->revokePermissionTo($permission);
      return redirect()->back()->with(['status'=> 'Permission deleted successfully.']);;
    }
    
  }
}
