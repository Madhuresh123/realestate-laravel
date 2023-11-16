<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;


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

    //Roles Adminstration

    public function AllRoles(){

        $roles = Role::all();
        return view('backend.all_roles', compact('roles'));    
    }

    public function AddRoles(){

        return view('backend.add_roles');

    }

     public function StoreRoles(Request $request){

        $request->validate([
            'name' => 'required|string',
        ]);
    
        if ($request->has('name')) {
            $role = Role::create([
                'name' => $request->name,
            ]);
        }
    
            $notification = array(
                'message' => 'Role Created Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.roles')->with($notification);
    }

    public function EditRoles($id){

        $role = Role::FindOrFail($id);
        return view('backend.edit_roles', compact('role'));
    }

    public function UpdateRoles(Request $request){

        $request->validate([
            'name' => 'required|string',
        ]);
    
        $role = Role::find($request->id);
    
        if (!$role) {
            abort(404);
        }
    
        $role->update([
            'name' => $request->name,
        ]);
    
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRoles($id){

        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    //AllRolesPermission
    public function AllRolesPermission(){

        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.all_roles_permission', compact('roles','permissions','permission_groups'));    
    }

    public function RolePermissionStore(Request $request){

        $data = array();
        $permission = $request->permission;

        foreach($permission as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => 'Roles and Permission added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('roles.permission.view')->with($notification);
    }

    public function RolesPermissionView(){

            $roles = Role::all();
            return view('backend.roles_permission_view', compact('roles') );
    }

    public function AdminEditRole($id){
        
        $role = Role::FindOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.edit_roles_permission', compact('role','permissions','permission_groups')); 
    }

    public function AdminRoleUpdate(Request $request, $id){

        $role = Role::FindOrFail($id);
        $permissions = $request->permission;

        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Roles and Permission updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('roles.permission.view')->with($notification);
    }

    public function AdminDeleteRole($id){

        $role = Role::FindOrFail($id);
        if(!is_null($role)){
            $role->delete();
        }
        
        $notification = array(
            'message' => 'Roles and Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function ImportPermission(){

        return view('backend.import_permission');
    }

    public function Export(){

        return Excel::download(new PermissionExport, 'permission.xlsx');

    }

    public function Import(Request $request){

        Excel::import(new PermissionImport, $request->file('import_file'));
        
        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    
}
