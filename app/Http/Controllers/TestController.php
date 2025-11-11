<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    public function index() {
        return view('pages.test');
    }

    public function show($page) {
        return Inertia::render('Test', [
            'selectedCategory' => $page
        ]);
    }

    public function letselschadeForm($slug = null) {
        return Inertia::render('LetselschadeForm', [
            'selectedCategory' => $slug
        ]);
    }
}
