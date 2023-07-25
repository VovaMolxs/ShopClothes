<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
        //dd('test');
        return view('admin.index');
    }
}
