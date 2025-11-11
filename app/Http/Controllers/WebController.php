<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class WebController extends Controller
{
    public function index() {
        $reviews = app('App\Http\Services\ReviewService')->slides(5);
        return view('pages.home', ['reviews' => $reviews]);
    }

    public function contact() {
        return view('pages.contact');
    }
}
