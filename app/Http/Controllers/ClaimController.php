<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index() {
        return view('pages.letselschade', [
            'claimables' => __('claimables')
        ]);
    }

    public function show($slug)
    {
        $claimables = __('claimables');
        foreach ($claimables as $item) {
            if ($item['slug'] === $slug) {
                $data = $item;
                break;
            }
        }

        return view('pages.claim', [
            'claimables' => $claimables,
            'title' => $data['name'],
            'slug' => $data['slug'],
            'content' => $data['content']
        ]);
    }
}
