<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfileAkunController extends Controller
{
    public function indexadmin(){
        return view('admin.pages.profile.index');
    }
}
