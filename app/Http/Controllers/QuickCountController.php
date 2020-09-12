<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuickCountController extends Controller
{
    //


    public function index() {
        return view('quick/index');
    }

    public function quick_count() {
        return view('quick/amchart');
    }
}
