<?php

use App\Http\Controllers\ProfileController;
use App\Models\Message;
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
    $messages = Message::all()->sortByDesc('created_at');
    return view('contact', ['messages' => $messages]);
});
Route::delete('delete-messages/{id}', function ($id){
    $message = Message::find($id);
    $message->delete();
    return redirect('/contact#messageArea');
});
Route::get('edit-message/{id}', function ($id) {
    $message = Message::find($id);
    return view('editMessage', ['message'=>$message]);
});
Route::put('edit-message/{id}', function (Request $request, $id) {
    $message = Message::find($id);
    $message->message = $request->message;
    $message->save();
    return redirect('/contact#messageArea');
});

Route::post('/send-message', function (Request $request) {
    $message = new Message;
    $message->email = $request->email;
    $message->mobile = $request->mobile;
    $message->fullName = $request->fullName;
    $message->message = $request->message;
    $message->save();
    // Message::insert([
    //     'email' => $request->email,
    //     'mobile' => $request->mobile,
    //     'fullName' => $request->fullName,
    //     'message' => $request->message,
    // ]);
    // DB::table('messages')->insert([
    //     'email' => $request->email,
    //     'mobile' => $request->phone,
    //     'fullName' => $request->fullName,
    //     'message' => $request->message,
    // ]);
    return redirect('/contact');
    // return
    // '<ul>' .
    // '<li>' . $request->email . '</li>' .
    // '<li>' . $request->mobile . '</li>' .
    // '<li>' . $request->fullName . '</li>' .
    // '<li>' . $request->message . '</li>' .
    //     '</ul>';
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
