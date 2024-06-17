<?php

use Inertia\Inertia;
use App\Livewire\Page;
use App\Livewire\Tutors;
use App\Livewire\Contact;
use App\Livewire\Courses;
use App\Livewire\Welcome;
use App\Livewire\MockExams;
use Illuminate\Http\Request;
use App\Livewire\Tutor\Profile;
use App\Livewire\Tutor\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\CrashCourse;
use App\Livewire\Subscription;

Route::get('/', Welcome::class)->name











('welcome');
Route::get('/pages/{slug}', Page::class)->name('pages');
Route::get('contact-us', Contact::class)->name('contact-us');
Route::get('tutor-login', Login::class)->name('tutor-login');
Route::get('all-tutors', Tutors::class)->name('all-tutors');
Route::get('all-courses', Courses::class)->name('all-courses');
Route::get('all-mock-exams', MockExams::class)->name('all-mock-exams');
Route::get('all-crash-courses', CrashCourse::class)->name('all-crash-courses');
Route::get('all-subscriptions', Subscription::class)->name('all-subscriptions');

// Route::get('home', HomeController::class)->name('home');
Route::any('language/{language}', function (Request $request, $language) {
    $request->session()->put('locale', $language);
    session()->put('locale', $language);

    return redirect()->back();
})->name('language');

Route::middleware(['auth:tutor'])->group(function () {
    Route::get('tutor-profile', Profile::class)->name('tutor-profile');
    // Other tutor-specific routes
});

Route::any('nova/language/{language}', function (Illuminate\Http\Request $request, $language) {
    $request->session()->put('locale', $language);
    session()->put('locale', $language);

    return redirect()->route('nova.pages.home');
})->name('nova.language');

