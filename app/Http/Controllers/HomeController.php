<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kandidat = DB::table('job_applications')->get();
        $job = DB::table('jobs')->get();
        $contact = DB::table('contact_us')->get();
        $faq = DB::table('faq')->get();
        $topJobs = DB::table('job_applicants_view')
            ->select('jobID', DB::raw('COUNT(id) as total_pelamar'))
            ->groupBy('jobID')
            ->orderBy('total_pelamar', 'desc')
            ->limit(3)
            ->get();

        $detail_job = [];
        foreach($topJobs as $tj){
            $detail_job[] = DB::table('jobs')->where('jobID', $tj->jobID)->first();
        }

        $arr = [
            'total_kandidat' => count($kandidat),
            'total_job' => count($job),
            'total_contact' => count($contact),
            'total_faq' => count($faq),
            'topJobs' => $detail_job,
        ];
        return view('admin.test', $arr);
    }
}
