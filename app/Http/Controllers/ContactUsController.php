<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { //test
        $contactUs = DB::table('contact_us')->get();
        return response()->json($contactUs);
    }

    public function store(Request $request)
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

    public function show($id)
    {
        $contactUs = DB::table('contact_us')->find($id);
        if (!$contactUs) {
            return response()->json(['message' => 'Contact message not found'], 404);
        }
        return response()->json($contactUs);
    }

    public function destroy($id)
    {
        $contactUs = DB::table('contact_us')->find($id);
        if (!$contactUs) {
            return response()->json(['message' => 'Contact message not found'], 404);
        }

        DB::table('contact_us')->where('id', $id)->delete();

        return response()->json(['message' => 'Contact message deleted']);
    }
}
