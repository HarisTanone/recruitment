<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Exports\exportJobExcel;
use Excel;

class listKandidat extends Controller
{
    public function index()
    {
        $kandidatList = DB::table('job_applicants_view')->get();
        return view('admin.kandidat.index', compact('kandidatList'));
    }

    public function exportxlx()
    {
        $applicants = DB::table('job_applicants_view')->get();
        return Excel::download(new exportJobExcel($applicants), 'list_kandidat.xlsx');
    }
}
