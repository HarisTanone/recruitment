<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class landingController extends Controller
{
    public function faq_view()
    {
        return view('user/pages/faq-pages');
    }
    public function contact_view()
    {
        return view('user/pages/contact-pages');
    }
    public function about_view()
    {
        return view('user/pages/about-pages');
    }
    public function apply()
    {
        return view('user/pages/apply-pages');
    }

    public function faq_index()
    {
        $faqs = DB::table('faq')->where(['status' => 1])->get();
        return response()->json($faqs);
    }

    public function store_contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $contactUs = DB::table('contact_us')->insertGetId([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return response()->json(['message' => 'Contact message created successfully', 'data' => $contactUs]);
    }
}
