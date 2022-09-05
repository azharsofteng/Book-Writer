<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    
    public function message()
    {
        $messages = Message::latest()->get();
        return view('admin.message', compact('messages'));
    }

    public function deleteMessage($id)
    {
        try {
            $message = Message::find($id);
            $message->delete();
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something went wrong!', 'error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }
}
