<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        return view('pages.customer.dashboard');
    }
}
