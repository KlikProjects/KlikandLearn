<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

/*  return a view instructing the user to click the email verification link that was emailed to them by Laravel after registration.  */

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

