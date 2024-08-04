<?php

use App\Livewire\Page;
use App\Events\MyEvent;
use App\Livewire\Tutors;
use App\Livewire\Contact;
use App\Livewire\Courses;
use App\Livewire\Payment;
use App\Livewire\Welcome;
use App\Models\NewsLetter;
use App\Livewire\Auth\Email;
use Illuminate\Http\Request;
use App\Livewire\Auth\Verify;
use App\Livewire\CrashCourse;
use App\Livewire\Subscription;
use App\Events\MockExamCreated;
use App\Livewire\MockExam\Show;
use App\Livewire\Tutor\Details;
use App\Livewire\Tutor\Profile;
use App\Models\StudentProgress;
use App\Livewire\SharedLoginPage;
use App\Livewire\Student\Calendar;
use App\Livewire\Tutor\AboutTutor;
use App\Livewire\Tutor\Auth\Login;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\MockExam\MockExams;
use Illuminate\Support\Facades\Route;
use App\Livewire\MockExam\BankScenario;
use App\Livewire\Student\Auth\Register;
use App\Livewire\BankScenario\Scenarios;
use App\Livewire\Tutor\Calendar as TutorCalendar;
use App\Http\Controllers\StudentProgressController;
use App\Livewire\Student\Profile as StudentProfile;

Route::get('shared-login', SharedLoginPage::class)->name('shared-login');

Route::get('/', Welcome::class)->name('welcome');

Route::get('/pages/{slug}', Page::class)->name('pages');
Route::get('contact-us', Contact::class)->name('contact-us');
Route::get('tutor-login', Login::class)->name('tutor-login');
Route::get('all-tutors', Tutors::class)->name('all-tutors');
Route::get('all-courses', Courses::class)->name('all-courses');
Route::get('all-mock-exams', MockExams::class)->name('all-mock-exams');
Route::get('mock-exams/{mock}', Show::class)->name('mock-exams.show');
Route::get('all-crash-courses', CrashCourse::class)->name('all-crash-courses');
Route::get('all-subscriptions', Subscription::class)->name('all-subscriptions');
Route::get('tutors/{tutor}', Details::class)->name('tutors.details');
Route::get('tutors/about/{tutor}/mock_exam/{mock_exam}', AboutTutor::class)->name('tutors.about');
Route::get('payment', Payment::class)->name('payment');
Route::get('scenarios/{scenario}', Scenarios::class)->name('bank-scenario.scenarios');

Route::prefix('courses')->as('courses.')->group(function () {
    Route::get('/{course}', App\Livewire\Course\Show::class)->name('show');
});

Route::prefix('mock-exams')->as('mock-exams.')->group(function () {
    Route::get('book-mock/{mock}', App\Livewire\MockExam\BookMock::class)->name('book-mock');
});

Route::prefix('crash-courses')->as('crash-courses.')->group(function () {
    Route::get('/{crash_course}', \App\Livewire\CrashCourse\Show::class)->name('show');
});

Route::prefix('subscriptions')->as('subscriptions.')->group(function () {
    Route::get('/{subscription}', \App\Livewire\Subscription\Show::class)->name('show');
});


Route::prefix('auth')->as('auth.')->group(function () {
    Route::get('email/{type}', Email::class)->name('email');
    Route::get('verify/{email}/{type}', Verify::class)->name('verify');
    Route::get('reset-password/{type}/{otp_token}/{email}', ResetPassword::class)->name('reset_password');
});

Route::middleware(['auth:tutor'])->group(function () {
    Route::get('tutor-profile', Profile::class)->name('tutor-profile');
    Route::get('tutor-logout', [Login::class, 'logout'])->name('tutor-logout');
    Route::get('tutor-calendar', TutorCalendar::class)->name('tutor-calendar');
    Route::prefix('mock-exams')->as('mock-exams.')->group(function () {
        Route::get('/{mock}/bank-scenarios', BankScenario::class)->name('bank-scenarios');
    });
});

Route::get('student-register', Register::class)->name('student-register');
Route::get('student-login', \App\Livewire\Student\Auth\Login::class)->name('student-login');

Route::middleware(['auth:web'])->group(function () {
    Route::get('student-profile', StudentProfile::class)->name('student-profile');
    Route::get('student-logout', [\App\Livewire\Student\Auth\Login::class, 'logout'])->name('student-logout');
    Route::get('student-calendar', Calendar::class)->name('student-calendar');
    
    Route::post('/complete-video', [StudentProgressController::class,'store'])->name('complete.video');
});

Route::any('nova/language/{language}', function (Illuminate\Http\Request $request, $language) {
    $request->session()->put('locale', $language);
    session()->put('locale', $language);

    return redirect()->route('nova.pages.home');
})->name('nova.language');

Route::any('language/{language}', function (Request $request, $language) {
    $request->session()->put('locale', $language);
    session()->put('locale', $language);

    return redirect()->back();
})->name('language');

Route::post('news-letter', function (Request $request) {
    $request->validate([
        'email' => 'required|email|unique:news_letters,email',
    ]);

    NewsLetter::create(['email' => $request->email]);

    return redirect()->back()->with('success', 'Subscribed successfully!');
})->name('news_letter.store');

Route::get('events', function(){
    $mock = \App\Models\MockExam::first();
    event(new MockExamCreated($mock));
});

