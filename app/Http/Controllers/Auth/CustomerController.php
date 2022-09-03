<?php

namespace App\Http\Controllers\Auth;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function customerLogin()
    {
        return view('auth.customer.login');
    }

    public function customerRegistration()
    {
        return view('auth.customer.registration');
    }

    public function saveCustomer(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->status = 'a';
        $customer->password = Hash::make($request->password);
        $customer->save();

        if ($customer) {
            Toastr::success('Registration Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            Auth::guard('customer')->login($customer);
            return redirect()->route('customer.dashboard');
        }

        return redirect()->back()->withInput();

    }

    public function loginCheck(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::guard('customer')->attempt($credentials)) {
            Toastr::success('Login Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return redirect()->intended('/customer/dashboard');  
        }
        return redirect()->back()
            ->withInput($request->only('phone'))
            ->with('error', 'Email number or Password was invalid.');

    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }
}
