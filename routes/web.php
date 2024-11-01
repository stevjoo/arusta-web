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

Route::get('/contact', function () {
    return inertia('Contact');
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

Route::get('/admin-login', function () {
    return inertia('Admin/AdminLogin');
});

Route::get('/admin-behind-the-lense', function () {
    return inertia('Admin/EditBehindtheLense');
});

Route::get('/admin-home', function () {
    return inertia('Admin/EditHome');
});

Route::get('/admin-photography', function () {
    return inertia('Admin/EditPortfolio/EditPhotography');
});

Route::get('/admin-video-reels', function () {
    return inertia('Admin/EditPortfolio/EditVideoReels');
});

Route::get('/admin-graphic-design', function () {
    return inertia('Admin/EditPortfolio/EditGraphicDesign');
});
