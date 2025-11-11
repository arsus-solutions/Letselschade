<?php

namespace App\Http\Controllers;

use App\Http\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ReviewController extends Controller
{
    /**
     * Display paginated reviews
     */
    public function index(Request $request)
    {
        $allReviews = (new ReviewService())->index();
        $perPage = 10; // Reviews per page
        $currentPage = $request->get('page', 1);
        
        // Manual pagination for array data
        $total = count($allReviews);
        $offset = ($currentPage - 1) * $perPage;
        $items = array_slice($allReviews, $offset, $perPage);
        
        $reviews = new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );
        
        return view('pages.reviews', compact('reviews'));
    }
}

