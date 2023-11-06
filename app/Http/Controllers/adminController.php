<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.admin_dashboard');
    }
}
