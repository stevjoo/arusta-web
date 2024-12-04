@extends('layouts.app')

@section('title', 'Review')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Review</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .star-rating {
            font-size: 1.5rem;
            direction: rtl;
            display: inline-flex;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            cursor: pointer;
            color: #ddd;
        }
        .star-rating input[type="radio"]:checked ~ label {
            color: #f59e0b;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f59e0b;
        }
    </style>
</head>
<body>
    <div class="container mx-auto mt-5 p-4">
        @auth
        @if(auth()->user()->isAdmin())
        <h1></h1>
        @else
        <h2 class="text-center mb-4 text-2xl font-semibold">Share your experience</h2>
        @endif
        @endauth

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Thank-You Message or Form -->
        @if($userReview)
            <div class="bg-gradient-to-r from-gray-600 to-black bg-opacity-50 border text-white-800 p-4 rounded text-center">
                <h4 class="text-xl font-semibold">Thank you for submitting your review!</h4>
                <p><strong>Your Review:</strong></p>
                <p>Rating: {{ $userReview->star_rating }} stars</p>
                <p>{{ $userReview->comments }}</p>

                @if(Auth::check() && Auth::id() == $userReview->user_id)
                    <div class="mt-3 flex justify-center space-x-4">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded"
                                onclick="openModal('editReviewModal{{ $userReview->id }}')">
                            Edit
                        </button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded"
                                onclick="openModal('deleteReviewModal{{ $userReview->id }}')">
                            Delete
                        </button>
                    </div>
                @endif
            </div>
        @else
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Auth::check() && Auth::user()->role !== 1)
                <!-- Review Form -->
                <form action="{{ route('review.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="rating" class="block text-gray-700">Rating</label>
                        <div class="star-rating">
                            <input type="radio" id="rating-5" name="rating" value="5">
                            <label for="rating-5">&#9733;</label>
                            <input type="radio" id="rating-4" name="rating" value="4">
                            <label for="rating-4">&#9733;</label>
                            <input type="radio" id="rating-3" name="rating" value="3">
                            <label for="rating-3">&#9733;</label>
                            <input type="radio" id="rating-2" name="rating" value="2">
                            <label for="rating-2">&#9733;</label>
                            <input type="radio" id="rating-1" name="rating" value="1">
                            <label for="rating-1">&#9733;</label>
                        </div>
                    </div>
                    <div>
                        <label for="comment" class="block text-gray-700">Your Review</label>
                        <textarea id="comment" name="comment" class="w-full border rounded p-2 text-black" rows="4" placeholder="Write your review here..."></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit Review</button>
                </form>
            @elseif(Auth::check() && Auth::user()->role === 1)
                <div class="bg-blue-100 text-blue-800 p-4 rounded text-center">
                    <p>As an administrator, you cannot submit reviews.</p>
                </div>
            @endif
        @endif

    <!-- Display Reviews -->
    <div class="max-w-6xl mx-auto mt-10">
        <h3 class="text-2xl font-bold text-center mb-8">Reviews from Other Users</h3>
        
        @if($reviews->isEmpty())
            <p class="text-center text-gray-500">
                No reviews yet.
                @if(!Auth::check())
                    Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">login</a> to leave a review!
                @elseif(Auth::user()->role === 1)
                    As an administrator, you cannot submit reviews.
                @else
                    Be the first to leave a review!
                @endif
            </p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
                @foreach($reviews as $review)
                    <div class="border bg-white rounded-lg shadow-lg p-6 transition-shadow hover:shadow-xl">
                        <!-- Review Header -->
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h5 class="text-lg font-semibold text-gray-800">{{ $review->user->name }}</h5>
                                <small class="text-gray-500">{{ $review->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->star_rating)
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                        </div>

                        <!-- Review Content -->
                        <p class="text-gray-600 mb-4">{{ $review->comments }}</p>

                    </div>

                    <!-- Edit Modal -->
                    <div id="editReviewModal{{ $review->id }}" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50">
                        <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg p-8 w-full max-w-md">
                            <h5 class="text-xl font-semibold mb-4">Edit Your Review</h5>
                            <form action="{{ route('review.update', $review->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                
                                <!-- Rating Input -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-2">Rating</label>
                                    <div class="flex space-x-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <button type="button"
                                                class="text-2xl focus:outline-none {{ $i <= $review->star_rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                                onclick="updateRating('{{ $review->id }}', {{ $i }})">
                                                ★
                                            </button>
                                        @endfor
                                    </div>
                                    <input type="hidden" name="rating" id="ratingInput{{ $review->id }}" value="{{ $review->star_rating }}">
                                </div>

                                <!-- Comment Input -->
                                <div class="mb-4">
                                    <label for="comment" class="block text-gray-700 mb-2">Your Review</label>
                                    <textarea 
                                        name="comment" 
                                        class="w-full border rounded p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        rows="4">{{ $review->comments }}</textarea>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex justify-end space-x-2">
                                    <button type="button" 
                                        onclick="closeModal('editReviewModal{{ $review->id }}')"
                                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors">
                                        Cancel
                                    </button>
                                    <button type="submit" 
                                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div id="deleteReviewModal{{ $review->id }}" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50">
                        <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg p-8 w-full max-w-md">
                            <h5 class="text-xl font-semibold mb-4">Delete Review</h5>
                            <p class="text-gray-600 mb-6">Are you sure you want to delete this review? This action cannot be undone.</p>
                            
                            <div class="flex justify-end space-x-2">
                                <button type="button" 
                                    onclick="closeModal('deleteReviewModal{{ $review->id }}')"
                                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors">
                                    Cancel
                                </button>
                                <form action="{{ route('review.destroy', $review->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- JavaScript for Modal and Star Rating -->
    <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
            }
        }

        function updateRating(modalId, rating) {
            const ratingInput = document.getElementById(`ratingInput${modalId}`);
            if (ratingInput) {
                ratingInput.value = rating;
            }

            // Update star visuals
            const stars = document.querySelectorAll(`#editReviewModal${modalId} .text-2xl`);
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('text-yellow-500');
                    star.classList.remove('text-gray-400');
                } else {
                    star.classList.add('text-gray-400');
                    star.classList.remove('text-yellow-500');
                }
            });
        }
    </script>
</body>
</html>
@endsection
