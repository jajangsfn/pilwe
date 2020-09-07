<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index() {
        return view('admin/admin');
    }

    public function pemilihan() {
        return view('home/pemilihan');
    }

    public function calon() {
        return view('home/calon');
    }
    public function warga() {
        return view('home/warga');
    }

    public function rt() {
        return view('home/rt');
    }

    public function bilik_suara() {
        return view('home/bilik_suara');
    }
}
