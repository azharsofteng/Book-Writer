<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function table()
    {
        return view('admin.table');
    }

    public function form()
    {
        return view('admin.form');
    }
    
}
