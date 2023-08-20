<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobHomeController extends Controller
{
    public function redirectToRoot()
    {
        return redirect('/');
    }

    public function index()
    {
        $jobs = DB::table('jobs')->take(8)->get(); // Ambil 8 data pertama
        return view('welcome', ['jobs' => $jobs]);
    }

    public function loadMore(Request $request)
    {
        $offset = $request->input('offset');
        $jobs = DB::table('jobs')->skip($offset)->take(8)->get();
        return response()->json($jobs);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $searchResults = DB::table('jobs')
            ->where('jobtitle', 'like', '%' . $query . '%')
            ->orWhere('jobdeskripsion', 'like', '%' . $query . '%')
            ->get();

        $jobs = DB::table('jobs')->take(8)->get();

        return view('welcome', [
            'jobs' => $jobs,
            'searchResults' => $searchResults,
        ]);
    }

    public function getJobDetail($jobID)
    {
        $job = DB::table('jobs')->where('jobID', $jobID)->first();

        if (!$job) {
            return response()->json(['error' => 'Job not found'], 404);
        }

        return response()->json($job);
    }
}
