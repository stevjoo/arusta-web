@extends('layouts.app')

@section('title', 'Review')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Your Experience</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .star-rating {
            font-size: 2rem;
            direction: rtl;
            display: inline-flex;
            gap: 0.5rem;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            cursor: pointer;
            color: #4B5563;
            transition: all 0.2s ease;
        }
        .star-rating input[type="radio"]:checked ~ label {
            color: #FBBF24;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #FBBF24;
            transform: scale(1.1);
        }
        body {
            background-color: #000000;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="motion-preset-confetti motion-delay-200 text-3xl font-bold text-white mb-2">Your feedback helps us improve</h1>
        </div>

        <!-- Review Statistics Section -->
        <div class="max-w-2xl mx-auto mb-12 bg-[#1c1c1c] rounded-lg p-8">
            <div class="flex items-start justify-between">
                <!-- Rating Overview -->
                <div class="flex items-center space-x-4">
                    <div>
                        <div class="text-4xl font-bold text-white">{{ number_format($averageRating, 1) }}</div>
                        <div class="text-sm text-gray-400">Out of 5 Stars</div>
                        <div class="text-sm text-gray-400 mt-1">Overall rating of {{ $totalReviews }} reviews</div>
                    </div>
                    <div class="flex items-center text-2xl text-yellow-400">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= round($averageRating))
                                <span>★</span>
                            @elseif ($i - 0.5 <= $averageRating)
                                <span>★</span>
                            @else
                                <span class="text-gray-600">★</span>
                            @endif
                        @endfor
                    </div>
                </div>

                <!-- Rating Breakdown -->
                <div class="flex-1 max-w-sm ml-8">
                    @foreach(range(5, 1) as $rating)
                        <div class="flex items-center mb-1">
                            <span class="text-sm text-gray-400 w-16">{{ $rating }} Stars</span>
                            <div class="flex-1 mx-2">
                                <div class="h-2 rounded-full bg-gray-700">
                                    @php
                                        $percentage = $totalReviews > 0 ? ($ratingCounts[$rating] ?? 0) / $totalReviews * 100 : 0;
                                    @endphp
                                    <div class="h-2 rounded-full bg-blue-500" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                            <span class="text-sm text-gray-400 w-8">{{ $ratingCounts[$rating] ?? 0 }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="max-w-2xl mx-auto mb-8">
                <div class="bg-green-900/20 border border-green-800 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-green-400">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- User's Review Section -->
        @if($userReview)
            <div class="max-w-2xl mx-auto mb-12">
                <div class="bg-[#1c1c1c] rounded-lg p-8">
                    <h2 class="text-2xl font-semibold text-center text-white mb-6">Your Review</h2>
                    <div class="flex justify-center mb-4">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="text-2xl {{ $i <= $userReview->star_rating ? 'text-yellow-400' : 'text-gray-600' }}">★</span>
                        @endfor
                    </div>
                    <p class="text-gray-300 text-center mb-6 italic">"{{ $userReview->comments }}"</p>

                    @if(Auth::check() && Auth::id() == $userReview->user_id)
                        <div class="flex justify-center space-x-4">
                            <button onclick="openModal('editReviewModal{{ $userReview->id }}')"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                Edit Review
                            </button>
                            <button onclick="openModal('deleteReviewModal{{ $userReview->id }}')"
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                Delete Review
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        @else
            <!-- Review Form -->
            @if(Auth::check() && Auth::user()->role !== 1)
                <div class="max-w-2xl mx-auto">
                    <div class="bg-[#1c1c1c] rounded-lg p-8">
                        <form action="{{ route('review.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="text-center">
                                <label class="block text-xl font-medium text-white mb-4">
                                    How would you rate your experience?
                                </label>
                                <div class="star-rating mb-6">
                                    <input type="radio" id="rating-5" name="rating" value="5">
                                    <label for="rating-5">★</label>
                                    <input type="radio" id="rating-4" name="rating" value="4">
                                    <label for="rating-4">★</label>
                                    <input type="radio" id="rating-3" name="rating" value="3">
                                    <label for="rating-3">★</label>
                                    <input type="radio" id="rating-2" name="rating" value="2">
                                    <label for="rating-2">★</label>
                                    <input type="radio" id="rating-1" name="rating" value="1">
                                    <label for="rating-1">★</label>
                                </div>
                            </div>
                            
                            <div>
                                <label for="comment" class="block text-sm font-medium text-gray-300 mb-2">
                                    Your Review
                                </label>
                                <textarea id="comment" name="comment" rows="4"
                                    class="w-full px-3 py-2 bg-[#2c2c2c] text-gray-200 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="Share your thoughts..."></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" 
                                    class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    Submit Review
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endif

        <!-- Reviews Display Section -->
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-center text-white mb-12">What Others Are Saying</h2>
            
            @if($reviews->isEmpty())
                <div class="text-center py-12">
                    <p class="text-gray-400 text-lg">
                        No reviews yet. 
                        @if(!Auth::check())
                            <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300">Login</a> to be the first to review!
                        @else
                            Be the first to share your thoughts!
                        @endif
                    </p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    @foreach($reviews as $index => $review)
                    <div class="motion-preset-shrink bg-[#1c1c1c] rounded-lg overflow-hidden" style="animation-delay: {{ $index * 150 }}ms;">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-lg font-medium text-white">{{ $review->user->name }}</h3>
                                    <p class="text-sm text-gray-400">{{ $review->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="flex">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span class="text-xl {{ $i <= $review->star_rating ? 'text-yellow-400' : 'text-gray-600' }}">★</span>
                                    @endfor
                                </div>
                            </div>
                            <p class="text-gray-300">{{ $review->comments }}</p>
                        </div>
                    </div>
                @endforeach

                </div>
            @endif
        </div>

        <!-- Modals -->
        @if($userReview)
            <!-- Edit Modal -->
            <div id="editReviewModal{{ $userReview->id }}" class="hidden fixed inset-0 z-50 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                    <div class="fixed inset-0 transition-opacity bg-black bg-opacity-75" aria-hidden="true"></div>
                    
                    <div class="motion-scale-in-[0.5]
                    motion-translate-x-in-[-25%]
                    motion-translate-y-in-[25%] motion-opacity-in-[0%]
                    motion-rotate-in-[-10deg] motion-blur-in-[5px]
                    motion-duration-[0.70s]
                    motion-duration-[0.53s]/translate
                    motion-duration-[0.35s]/opacity
                    motion-duration-[0.34s]/blur
                    motion-delay-[0.17s]/blur
                    relative inline-block w-full max-w-md p-6 overflow-hidden text-left align-middle transition-all transform bg-[#1c1c1c] rounded-lg shadow-xl">
                        <h3 class="text-2xl font-semibold text-white mb-6">Edit Review</h3>
                        
                        <form action="{{ route('review.update', $userReview->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            
                            <div class="mb-6">
                                <label class="block text-gray-300 mb-2">Rating</label>
                                <div class="flex justify-center space-x-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <button type="button" 
                                            class="text-3xl focus:outline-none {{ $i <= $userReview->star_rating ? 'text-yellow-400' : 'text-gray-600' }}"
                                            onclick="updateRating('{{ $userReview->id }}', {{ $i }})">★</button>
                                    @endfor
                                </div>
                                <input type="hidden" name="rating" id="ratingInput{{ $userReview->id }}" value="{{ $userReview->star_rating }}">
                            </div>

                            <div class="mb-6">
                                <label for="comment" class="block text-gray-300 mb-2">Your Review</label>
                                <textarea name="comment" 
                                    class="w-full px-3 py-2 bg-[#2c2c2c] text-gray-200 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    rows="4">{{ $userReview->comments }}</textarea>
                            </div>

                            <div class="flex justify-end space-x-3">
                                <button type="button" 
                                    onclick="closeModal('editReviewModal{{ $userReview->id }}')"
                                    class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-colors">
                                    Cancel
                                </button>
                                <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div id="deleteReviewModal{{ $userReview->id }}" class="hidden fixed inset-0 z-50 overflow-y-auto ">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                    <div class="fixed inset-0 transition-opacity bg-black bg-opacity-75" aria-hidden="true"></div>

                    <div class="motion-scale-in-[0.5]
                    motion-translate-x-in-[-25%]
                    motion-translate-y-in-[25%] motion-opacity-in-[0%]
                    motion-rotate-in-[-10deg] motion-blur-in-[5px]
                    motion-duration-[0.70s]
                    motion-duration-[0.53s]/translate
                    motion-duration-[0.35s]/opacity
                    motion-duration-[0.34s]/blur
                    motion-delay-[0.17s]/blur
                      relative inline-block w-full max-w-sm p-6 overflow-hidden
                       text-left align-middle transition-all transform bg-[#1c1c1c] rounded-lg shadow-xl">
                        <div class="text-center">
                            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-900/20 mb-4">
                                <svg class="h-10 w-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            
                            <h3 class="text-2xl font-semibold text-white mb-2">Delete Review</h3>
                            <p class="text-gray-300 mb-6">Are you sure you want to delete this review? This action cannot be undone.</p>
                            
                            <div class="flex justify-center space-x-3">
                                <button type="button" 
                                    onclick="closeModal('deleteReviewModal{{ $userReview->id }}')"
                                    class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-colors">
                                    Cancel
                                </button>
                                <form action="{{ route('review.destroy', $userReview->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                        Delete Review
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function updateRating(reviewId, rating) {
            const ratingInput = document.getElementById(`ratingInput${reviewId}`);
            if (ratingInput) {
                ratingInput.value = rating;
            }

            // Update star visuals
            const stars = document.querySelectorAll(`#editReviewModal${reviewId} button`);
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.remove('text-gray-600');
                    star.classList.add('text-yellow-400');
                } else {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-600');
                }
            });
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modals = document.querySelectorAll('[id$="Modal"]');
            modals.forEach(modal => {
                if (event.target === modal || event.target.classList.contains('fixed')) {
                    closeModal(modal.id);
                }
            });
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const visibleModal = document.querySelector('[id$="Modal"]:not(.hidden)');
                if (visibleModal) {
                    closeModal(visibleModal.id);
                }
            }
        });

        
    </script>
</body>
</html>
@endsection