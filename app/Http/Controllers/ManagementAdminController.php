<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementAdminController extends Controller
{
    public function index(){
        return view('admin.ManagementAdmin.index');
    }

    public function indexcreate(){
        return view('admin.ManagementAdmin.create');
    }


}
