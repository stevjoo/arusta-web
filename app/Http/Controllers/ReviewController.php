<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function reviewstore(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'comment' => 'required|string|max:500',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Create a new review
        $review = new Review();
        $review->comments = $request->comment;
        $review->star_rating = $request->rating;
        $review->user_id = Auth::id(); // Authenticated user's ID
        $review->save();

        // Retrieve the user's name
        $userName = $review->user->name;

        // Redirect back with message, review, and userName
        return redirect()->back()->with([
            'success' => 'Review added successfully!',
            'review' => $review,
            'userName' => $userName,
        ]);
    }

    public function form_view()
    {
    // Fetch all reviews with user information
        $reviews = Review::with('user')->latest()->get();

        // Check if the authenticated user has already submitted a review
        $userReview = Auth::check() ? Review::where('user_id', Auth::id())->first() : null;

        return view('user/testimoni', compact('reviews', 'userReview'));
    }

}

