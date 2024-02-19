<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ManagementPeminjamController extends Controller
{
    public function index(){
        return view('admin.pages.management_peminjam');
    }
}
