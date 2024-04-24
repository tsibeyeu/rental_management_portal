<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller

{
    function index()  {
        $permissions=Permission::all();
       return view('admin.permissions.index',compact('permissions'));
        
    }
    function create()  {
        return view('admin.permissions.create');
        
    }
    function store(Request $request)  {
        $validated=$request->validate(['name'=>'required']);
        Permission::create($validated);
        return redirect()->route('admin.permissions.index');
 
    }
    function edit (Permission $permission)  {
            return view('admin.permissions.edit',compact('permission'));
            
        }
        function update(Request $request,Permission $permission) {
        $validated=$request->validate(['name'=>'required']);
        $permission->update($validated);
        return redirect()->route('admin.permissions.index');
            
        }
        
        
        function destroy(Permission $permission)  {
            $permission->delete();
            return redirect()->route('admin.permissions.index');
            
            
        }
 
}
