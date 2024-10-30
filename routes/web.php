<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Home');
});

Route::get('/behindthelense', function () {
    return inertia('BehindtheLense');
});

Route::get('/portfolio', function () {
    return inertia('Portfolio/Portfolio');
});

Route::get('/photography', function () {
    return inertia('Portfolio/Photography');
});

Route::get('/video-reels', function () {
    return inertia('Portfolio/VideoReels');
});

Route::get('/graphic-design', function () {
    return inertia('Portfolio/GraphicDesign');
});
