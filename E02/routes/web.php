<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
Route::view('/', 'welcome', ['day' => false, 'isActive' => false]);

Route::get('/book/{id}/page/{number}', function ($id, $number) {
    return 'Book ' . $id . ' - Page ' . $number;
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::post('/send-message', function (Request $request) {
    return
    '<ul>' .
    '<li>' . $request->email . '</li>' .
    '<li>' . $request->phone . '</li>' .
    '<li>' . $request->fullName . '</li>' .
    '<li>' . $request->message . '</li>' .
        '</ul>';
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
