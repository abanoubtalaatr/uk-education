<?php

use App\Livewire\Page;
use App\Livewire\Tutors;
use App\Livewire\Contact;
use App\Livewire\Courses;
use App\Livewire\Welcome;
use Illuminate\Http\Request;
use App\Livewire\CrashCourse;
use App\Livewire\Subscription;
use App\Livewire\Tutor\Profile;
use App\Livewire\Tutor\Auth\Login;
use App\Livewire\MockExam\MockExams;
use Illuminate\Support\Facades\Route;
use App\Livewire\Student\Auth\Register;
use App\Livewire\MockExam\Show;

Route::get('/', Welcome::class)->name('welcome');

Route::get('/pages/{slug}', Page::class)->name('pages');
Route::get('contact-us', Contact::class)->name('contact-us');
Route::get('tutor-login', Login::class)->name('tutor-login');
Route::get('all-tutors', Tutors::class)->name('all-tutors');
Route::get('all-courses', Courses::class)->name('all-courses');
Route::get('all-mock-exams', MockExams::class)->name('all-mock-exams');
Route::get('mock-exams/{mock}',Show::class)->name('mock-exams.show');
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
    Route::get('tutor-logout', [Login::class, 'logout'])->name('tutor-logout');

    // Other tutor-specific routes
});

Route::get('student-register', Register::class)->name('student-register');
Route::get('student-login', \App\Livewire\Student\Auth\Login::class)->name('student-login');

Route::middleware(['auth:web'])->group(function () {
    Route::get('student-profile', Profile::class)->name('student-profile');
    Route::get('student-logout', [\App\Livewire\Student\Auth\Login::class, 'logout'])->name('student-logout');

});

Route::any('nova/language/{language}', function (Illuminate\Http\Request $request, $language) {
    $request->session()->put('locale', $language);
    session()->put('locale', $language);

    return redirect()->route('nova.pages.home');
})->name('nova.language');

