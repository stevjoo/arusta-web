<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Review</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- Add Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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
            color: #ffc107;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffc107;
        }
        .review-actions {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .modal-star-rating {
            direction: ltr;
            display: flex;
            justify-content: center;
            gap: 5px;
            font-size: 24px;
        }
        .modal-star-rating i {
            cursor: pointer;
            color: #ddd;
        }
        .modal-star-rating i.active {
            color: #ffc107;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Submit Your Review</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Thank-You Message or Form -->
        @if($userReview)
            <div class="alert alert-info text-center">
                <h4>Thank you for submitting your review!</h4>
                <p><strong>Your Review:</strong></p>
                <p>Rating: {{ $userReview->star_rating }} stars</p>
                <p>{{ $userReview->comments }}</p>

                @if(Auth::check() && Auth::id() == $userReview->user_id)
                    <div class="mt-3 d-flex justify-content-center">
                        <button class="btn btn-warning me-2"
                                data-bs-toggle="modal"
                                data-bs-target="#editReviewModal{{ $userReview->id }}">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                        <button class="btn btn-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteReviewModal{{ $userReview->id }}">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>

                @endif
            </div>
        @else
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Auth::check() && Auth::user()->role !== 1)
                <!-- Review Form -->
            <form action="{{ route('review.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
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
                <div class="mb-3">
                    <label for="comment" class="form-label">Your Review</label>
                    <textarea id="comment" name="comment" class="form-control" rows="4" placeholder="Write your review here..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
            @elseif(Auth::check() && Auth::user()->role === 1)
                <div class="alert alert-info text-center">
                    <p>As an administrator, you cannot submit reviews.</p>
                </div>
            @endif

            
        @endif

        <!-- Display Reviews -->
        <div class="mt-5">
            <h3 class="text-center">Reviews from Other Users</h3>
            @if($reviews->isEmpty())
                @if(!Auth::check())
                    <p class="text-center">No reviews yet. Please <a href="{{ route('login') }}" class="text-primary">login</a> to leave a review!</p>
                @elseif(Auth::user()->role === 1)
                    <p class="text-center">No reviews yet. As an administrator, you cannot submit reviews.</p>
                @else
                    <p class="text-center">No reviews yet. Be the first to leave a review!</p>
                @endif
            @else
                <div class="row">
                    @foreach($reviews as $review)
                        <div class="col-md-6 mb-4">
                            <div class="card position-relative">
                                
                                <div class="card-body">
                                    <h5 class="card-title">{{ $review->user->name }}</h5>
                                    <div class="text-warning mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->star_rating)
                                                &#9733;
                                            @else
                                                &#9734;
                                            @endif
                                        @endfor
                                    </div>
                                    <p class="card-text">{{ $review->comments }}</p>
                                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                </div>
                            </div>

                            <!-- Edit Review Modal -->
                            <div class="modal fade" id="editReviewModal{{ $review->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Your Review</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('review.update', $review->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Rating</label>
                                                    <div class="modal-star-rating" id="starRating{{ $review->id }}">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <i class="bi bi-star{{ $i <= $review->star_rating ? '-fill' : '' }}"
                                                               data-rating="{{ $i }}"></i>
                                                        @endfor
                                                    </div>
                                                    <input type="hidden" name="rating" id="ratingInput{{ $review->id }}" 
                                                           value="{{ $review->star_rating }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Your Review</label>
                                                    <textarea name="comment" class="form-control" rows="4" 
                                                              required>{{ $review->comments }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update Review</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Review Modal -->
                            <div class="modal fade" id="deleteReviewModal{{ $review->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Review</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this review? This action cannot be undone.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('review.destroy', $review->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete Review</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

    <!-- Star Rating Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle star rating in edit modals
            document.querySelectorAll('.modal-star-rating').forEach(function(ratingContainer) {
                const reviewId = ratingContainer.id.replace('starRating', '');
                const stars = ratingContainer.querySelectorAll('i');
                const ratingInput = document.getElementById('ratingInput' + reviewId);

                stars.forEach(function(star) {
                    star.addEventListener('click', function() {
                        const rating = this.dataset.rating;
                        ratingInput.value = rating;
                        
                        stars.forEach(function(s) {
                            if (s.dataset.rating <= rating) {
                                s.classList.remove('bi-star');
                                s.classList.add('bi-star-fill');
                            } else {
                                s.classList.remove('bi-star-fill');
                                s.classList.add('bi-star');
                            }
                        });
                    });
                });
            });
        });
    </script>
</body>
</html>