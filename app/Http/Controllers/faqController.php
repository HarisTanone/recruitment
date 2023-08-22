<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class faqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        return view('admin.faq.index');
    }

    public function index()
    {
        $faqs = DB::table('faq')->get();
        return response()->json($faqs);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $faqId = DB::table('faq')->insertGetId([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'status' => $request->input('status', 0),
        ]);

        $faq = DB::table('faq')->where('id', $faqId)->first();
        return response()->json(['message' => 'FAQ created successfully', 'data' => $faq]);
    }

    public function show($id)
    {
        $faq = DB::table('faq')->find($id);
        if (!$faq) {
            return response()->json(['message' => 'FAQ not found'], 404);
        }
        return response()->json($faq);
    }

    public function update(Request $request, $id)
    {
        $faq = DB::table('faq')->find($id);

        if (!$faq) {
            return response()->json(['message' => 'FAQ not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::table('faq')->where('id', $id)->update([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'status' => $request->input('status', 0),
        ]);

        $updatedFaq = DB::table('faq')->find($id);
        return response()->json(['message' => 'FAQ updated successfully', 'data' => $updatedFaq]);
    }

    public function destroy($id)
    {
        $faq = DB::table('faq')->find($id);
        if (!$faq) {
            return response()->json(['message' => 'FAQ not found'], 404);
        }

        DB::table('faq')->where('id', $id)->delete();
        return response()->json(['message' => 'FAQ deleted']);
    }
}
