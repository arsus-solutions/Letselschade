<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class WebController extends Controller
{
    public function index() {
        return view('pages.home');
    }

    public function contact() {
        return view('pages.contact');
    }
}
