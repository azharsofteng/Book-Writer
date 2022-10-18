<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->get();
        return view('admin.faq', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|min:3',
            'answer' => 'required|string|min:3'
        ]);

        try {
            $faq = new Faq();
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->save();
            Toastr::success('Faq Insert Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something went wrong!', 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }

    public function edit($id)
    {
        $data['faq'] = Faq::find($id);
        $data['faqs'] = Faq::latest()->get();
        return view('admin.faq', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|min:3',
            'answer' => 'required|string|min:3'
        ]);

        try {
            $faq = Faq::find($id);
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->save();
            Toastr::success('FAQ Update Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return redirect()->route('faq.index');
        } catch (\Exception $e) {
            Toastr::error('Something went wrong!', 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }

    public function destroy($id)
    {
        try {
            $faq = Faq::find($id);
            $faq->delete();
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something went wrong!', 'error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }
}
