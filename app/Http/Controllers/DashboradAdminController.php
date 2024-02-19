<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboradAdminController extends Controller
{
    public function index(){
        return view('admin.dashboard.index');
    }
}
