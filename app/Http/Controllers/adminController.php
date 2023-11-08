<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.index');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');

    }

    public function AdminLogin(){

        return view('admin.admin_login');
    }

    public function AdminProfile(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            $filename = now()->format('YmdHi') . $file->getClientOriginalName(); 
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }

    public function AdminUpdatePassword(Request $request){

            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed'
            ]);

            //Match the Old password

            if(!Hash::check($request->old_password, auth::user()->password)){

                $notification = array(
                    'message' => 'Old password does not Match!!!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }

            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            $notification = array(
                'message' => 'Password Change Successfully',
                'alert-type' => 'success'
            );

            return back()->with($notification);


    }
}
