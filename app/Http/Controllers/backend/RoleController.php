<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    
    public function AllPermission(){

        $permissions = Permission::all();
        return view('backend.all_permission', compact('permissions'));

    }

    public function AddPermission(){

        return view('backend.add_permission');

    }

    public function StorePermission(Request $request){

        $request->validate([
            'name' => 'required|string',
            'group_name' => 'required|string',
        ]);
    
        if ($request->has('name')) {
            $permission = Permission::create([
                'name' => $request->name,
                'group_name' => $request->group_name,
            ]);
        }
    
            $notification = array(
                'message' => 'Permission Created Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id){

        $permissions = Permission::FindOrFail($id);
        return view('backend.edit_permission', compact('permissions'));
    }

    public function UpdatePermission(Request $request){

        $request->validate([
            'name' => 'required|string',
            'group_name' => 'required|string',
        ]);
    
        $permission = Permission::find($request->id);
    
        if (!$permission) {
            // Handle the case where the permission is not found
            abort(404);
        }
    
        $permission->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
    
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id){

        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }
    
}
