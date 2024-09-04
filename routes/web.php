<?php

use App\Livewire\AppointmentsIndex;
use App\Livewire\DashboardIndex;
use App\Livewire\PetDetailsIndex;
use App\Livewire\PetOwnerIndex;
use App\Http\Controllers\ProfileController;
use App\Livewire\PurchaseIndex;
use App\Livewire\VaccinationsIndex;
use Google\Rpc\Context\AttributeContext\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\AppointmentsController;


Route::get('/user/appointments', AppointmentsIndex::class)->name('user.appointments')->middleware('auth');


Route::middleware('auth')->get('/livewire/qr-code', [QrCodeController::class, 'showQRCode'])->name('livewire.qrcode');

Route::get('/', function () {
    return view('Page.Home');
})->name('home');

Route::get('/About', function () {
    return view('Page.About');
});
Route::get('/Service', function () {
    return view('Page.Service');
});
Route::get('/Appointment', function () {
    return view('Page.Appoinment');
});
Route::post('/Appointment', [AppointmentsController::class, 'store'])->name('Appointment');
Route::get('/Blog', function () {
    return view('Page.Blog');
});
Route::get('/ContactUs', function () {
    return view('Page.Contact');
});

Route::get('/BlogDetails', function () {
    return view('Page.BlogDetails');
});
Route::get('/Product', function () {
    return view('Page.Product');
});
Route::get('/checkout', function () {
    return view('Page.checkout');
});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// breeze for user dashboard

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('orders', App\Http\Controllers\OrdersController::class);
Route::resource('appointments',App\Http\Controllers\AppointmentsController::class);
Route::resource('purchased',App\Http\Controllers\PurchasedController::class);
Route::resource('petdetails',App\Http\Controllers\PetDetailsController::class);

// email verifications

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// MaryUi Dashboard routes
Route::get('/dashboards', DashboardIndex::class)->name('dashboard.index');
Route::get('/appointments', AppointmentsIndex::class)->name('appointments.index');
Route::get('/petdetails', PetDetailsIndex::class)->name('pet-details-index');
//Route::get('/purchased', PurchaseIndex::class)->name('purchase.index');
Route::get('/petowner', PetOwnerIndex::class)->name('pet-owner.index');
Route::get('/vaccinations', VaccinationsIndex::class)->name('vaccinations.index');

// routes/web.php
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to the dashboard after logout
})->name('logout');

// Route::get('/send-appointment-reminder/{appointment}', [AppointmentsController::class, 'sendReminder'])
//      ->name('send.appointment.reminder');


 Route::get('/Appointment', [AppointmentsController::class, 'testAuth'])->name('Appointment');

