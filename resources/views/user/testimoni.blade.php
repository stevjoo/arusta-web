<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Review</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
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
        @endif

        <!-- Display Other Users' Reviews -->
        <div class="mt-5">
            <h3 class="text-center">Reviews from Other Users</h3>
            @if($reviews->isEmpty())
                <p class="text-center">No reviews yet. Be the first to leave a review!</p>
            @else
                <ul class="list-group">
                    @foreach($reviews as $review)
                        <li class="list-group-item">
                            <p><strong>{{ $review->user->name }}</strong></p>
                            <p>Rating: {{ $review->star_rating }} stars</p>
                            <p>{{ $review->comments }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</body>
</html>
