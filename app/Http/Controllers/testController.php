<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    function test(){
        return view('admin.dashboard');
    }
}
