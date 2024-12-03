<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BehindTheLenseController;
use App\Http\Controllers\PhotographyController;
use App\Http\Controllers\GraphicDesignController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user/dashboard');
})->name('dashboard');

Route::get('/admin', [UserController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('admin');
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy')->middleware(['auth', 'verified', 'admin']);
Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit')->middleware(['auth', 'verified', 'admin']);
Route::patch('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update')->middleware(['auth', 'verified', 'admin']);


Route::get('/review',[ReviewController::class, 'form_view'])->name('review.view');
Route::post('/review-store', [ReviewController::class, 'reviewstore'])->middleware('auth')->name('review.store');
Route::post('/review/update/{id}', [ReviewController::class, 'update'])->middleware('auth')->name('review.update');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->middleware('auth')->name('review.destroy');

Route::get('/behind-the-lense', [BehindTheLenseController::class, 'publicIndex'])->name('behind-the-lense.index');
Route::get('/photography', [PhotographyController::class, 'publicIndex'])->name('photography.index');
Route::get('/graphic-design', [GraphicDesignController::class, 'publicIndex'])->name('graphic-design.index');

Route::get('/portfolio', function(){
    return view('user/portfolio');
})->name('portfolio');

Route::get('/price-list', function(){
    return view('user/price');
})->name('price');

Route::get('/admin/events', [EventController::class, 'adminIndex'])->middleware(['auth', 'verified', 'admin'])->name('admin.events');
Route::patch('/admin/events/{id}/approve', [EventController::class, 'approve'])->name('events.approve')->middleware(['auth', 'admin']);

Route::get('events/list', [EventController::class, 'listEvent'])->name('events.list');

Route::get('events/on/{date}', [EventController::class, 'eventsOnDate'])->name('events.onDate');

Route::resource('events', EventController::class)
    ->names([
        'index' => 'events',
        'create' => 'events.create',
        'store' => 'events.store',
        'show' => 'events.show',
        'edit' => 'events.edit',
        'update' => 'events.update',
        'destroy' => 'events.destroy',
]);

Route::get('/schedule', function(){
    return view('user/schedule');
})->name('schedule');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('admin-behind-the-lense', BehindTheLenseController::class)
    ->names([
        'index' => 'admin-behind-the-lense.index',
        'create' => 'admin-behind-the-lense.create',
        'store' => 'admin-behind-the-lense.store',
        'show' => 'admin-behind-the-lense.show',
        'edit' => 'admin-behind-the-lense.edit',
        'update' => 'admin-behind-the-lense.update',
        'destroy' => 'admin-behind-the-lense.destroy',
    ])->middleware(['auth', 'verified', 'admin']);


Route::resource('admin-photography', PhotographyController::class)
    ->names([
        'adminphotographyindex' => 'admin-photography.index',
        'adminphotographycreate' => 'admin-photography.create',
        'adminphotographystore' => 'admin-photography.store',
        'adminphotographyshow' => 'admin-photography.show',
        'adminphotographyedit' => 'admin-photography.edit',
        'adminphotographyupdate' => 'admin-photography.update',
        'adminphotographydestroy' => 'admin-photography.destroy',
    ])->middleware(['auth', 'verified', 'admin']);


Route::resource('admin-graphic-design', GraphicDesignController::class)
    ->names([
        'admingraphicdesignindex' => 'admin-graphic-design.index',
        'admingraphicdesigncreate' => 'admin-graphic-design.create',
        'admingraphicdesignstore' => 'admin-graphic-design.store',
        'admingraphicdesignshow' => 'admin-graphic-design.show',
        'admingraphicdesignedit' => 'admin-graphic-design.edit',
        'admingraphicdesignupdate' => 'admin-graphic-design.update',
        'admingraphicdesigndestroy' => 'admin-graphic-design.destroy',
    ])->middleware(['auth', 'verified', 'admin']);

require __DIR__.'/auth.php';
