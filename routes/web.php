<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('header');
}); */

Auth::routes([]);

Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\EventController::class, 'create'])->middleware('isadmin')->name('createEvent');
Route::post('/', [App\Http\Controllers\EventController::class, 'store'])->middleware('auth')->name('store');
Route::get('/inscribe/{id}', [App\Http\Controllers\EventController::class, 'inscribe'])->middleware('auth')->name('inscribe');
Route::get('/cancelInscription/{id}', [App\Http\Controllers\EventController::class, 'cancelInscription'])->middleware('auth')->name('cancelInscription');


//Route::get('/card/{id}', [App\Http\Controllers\EventController::class, 'card']);
//Route::resource('shows', App\Http\Controllers\EventController::class);
Route::get('/show/{id}/{user_count}/{ifSubscripted?}',[App\Http\Controllers\EventController::class,'show'])->name('show');


Route::resource('events', App\Http\Controllers\EventController::class)->middleware('isadmin');

/* Route::get('/signup', [App\Http\Controllers\EventController::class, 'viewSignedUp'])->middleware('auth')->name('signup'); */

/*  return a view instructing the user to click the email verification link that was emailed to them by Laravel after registration.  */

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


/* handle requests generated when the user clicks the email verification link that was emailed to them
 */

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

/* route to allow the user to request that the verification email be resent
 */

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware('verified');


