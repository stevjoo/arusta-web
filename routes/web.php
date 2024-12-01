<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BehindTheLenseController;
use App\Http\Controllers\PhotographyController;
use App\Http\Controllers\GraphicDesignController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user/dashboard');
})->name('dashboard');

Route::get('/admin', [UserController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('admin');
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy')->middleware(['auth', 'verified', 'admin']);

Route::get('/behind-the-lense', [BehindTheLenseController::class, 'publicIndex'])->name('behind-the-lense.index');
Route::get('/photography', [PhotographyController::class, 'publicIndex'])->name('photography.index');
Route::get('/graphic-design', [GraphicDesignController::class, 'publicIndex'])->name('graphic-design.index');

Route::get('/portfolio', function(){
    return view('user/portfolio');
})->name('portfolio');

Route::get('/schedule', function(){
    return view('user/schedule');
})->name('schedule');

Route::get('/admin/events', [EventController::class, 'adminIndex'])->middleware(['auth', 'verified', 'admin'])->name('admin.events');
Route::patch('/admin/events/{id}/approve', [EventController::class, 'approve'])->name('events.approve')->middleware(['auth', 'admin']);

Route::get('events/list', [EventController::class, 'listEvent'])->name('events.list');
Route::resource('events', EventController::class);
Route::get('events/on/{date}', [EventController::class, 'eventsOnDate'])->name('events.onDate');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Hanya user yang terautentikasi yang dapat mengakses formulir dan fungsi untuk mendaftar event
Route::group(['middleware' => ['auth']], function () {
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{event}', [EventController::class, 'update'])->name('events.update');
});


Route::resource('admin-behind-the-lense', BehindTheLenseController::class)->middleware(['auth', 'verified', 'admin'])->names([
    'index' => 'admin-behind-the-lense.index',
    'create' => 'admin-behind-the-lense.create',
    'store' => 'admin-behind-the-lense.store',
    'show' => 'admin-behind-the-lense.show',
    'edit' => 'admin-behind-the-lense.edit',
    'update' => 'admin-behind-the-lense.update',
    'destroy' => 'admin-behind-the-lense.destroy',
]);

Route::resource('admin-photography', PhotographyController::class)->middleware(['auth', 'verified', 'admin'])->names([
    'index' => 'admin-photography.index',
    'create' => 'admin-photography.create',
    'store' => 'admin-photography.store',
    'show' => 'admin-photography.show',
    'edit' => 'admin-photography.edit',
    'update' => 'admin-photography.update',
    'destroy' => 'admin-photography.destroy',
]);

Route::resource('admin-graphic-design', GraphicDesignController::class)->middleware(['auth', 'verified', 'admin'])->names([
    'index' => 'admin-graphic-design.index',
    'create' => 'admin-graphic-design.create',
    'store' => 'admin-graphic-design.store',
    'show' => 'admin-graphic-design.show',
    'edit' => 'admin-graphic-design.edit',
    'update' => 'admin-graphic-design.update',
    'destroy' => 'admin-graphic-design.destroy',
]);

require __DIR__.'/auth.php';
