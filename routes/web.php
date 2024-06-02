<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AttendEventQRController;
use App\Http\Controllers\PublicEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\AttendEventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\ShowMyBikesController;
use App\Http\Controllers\Settings\BikeController;
use App\Http\Controllers\Settings\HelpController;
use App\Http\Controllers\ShowDreamBikesController;
use App\Http\Controllers\EventAttendanceController;
use App\Http\Controllers\Onboarding\PhoneController;
use App\Http\Controllers\Settings\DreamBikeController;
use App\Http\Controllers\Onboarding\InterestController;
use App\Http\Controllers\Onboarding\SettingsController;
use App\Http\Controllers\Onboarding\UserBrandController;
use App\Http\Controllers\EventAttendeesAndPhotosController;
use App\Http\Controllers\Onboarding\PersonalInfoController;
use App\Http\Controllers\Settings\AccountSettingsController;
use App\Http\Controllers\Settings\PrivacySettingsController;
use App\Http\Controllers\Settings\InterestsSettingsController;
use App\Http\Controllers\Onboarding\PhoneVerificationController;
use App\Http\Controllers\Settings\NotificationSettingsController;
use Inertia\Inertia;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;

Route::get('/', HomeController::class);
Route::get('home', HomeController::class)->name('home');
Route::any('language/{language}', function (Request $request, $language) {
    $request->session()->put('locale', $language);
    session()->put('locale', $language);

    return redirect()->back();
})->name('language');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::get('user/profile', [UserProfileController::class, 'show'])->name('profile.show');

    Route::prefix('on-boarding')->group(function () {
        Route::get('personal-info', [PersonalInfoController::class, 'create'])->name('personal-info.create');
        Route::post('personal-info', [PersonalInfoController::class, 'store'])->name('personal-info.store');

        Route::get('brands', [UserBrandController::class, 'create'])->name('user-brands.create');
        Route::post('brands', [UserBrandController::class, 'store'])->name('user-brands.store');

        Route::get('phone', [PhoneController::class, 'create'])->name('phone.create');
        Route::post('phone', [PhoneController::class, 'store'])->name('phone.store');

        Route::get('phone-verification', [PhoneVerificationController::class, 'create'])->name('phone-verification.create');
        Route::post('phone-verification', [PhoneVerificationController::class, 'store'])->name('phone-verification.store');

        Route::get('settings', [SettingsController::class, 'create'])->name('settings.create');
        Route::post('settings', [SettingsController::class, 'store'])->name('settings.store');

        Route::get('interests', [InterestController::class, 'create'])->name('interests.create');
        Route::post('interests', [InterestController::class, 'store'])->name('interests.store');
    });

    Route::resource('events', EventController::class)->only([
        'index',
        'show',
    ]);

    Route::get('events/{event}/details', EventAttendeesAndPhotosController::class)->name('events.details');

    Route::get('events/{event}/attend', [EventAttendanceController::class, 'show'])->name('event.attendees.show');

    Route::post('events/{event}/attend', [EventAttendanceController::class, 'store'])->name('event.attend');

    Route::delete('events/{event}/attend', [EventAttendanceController::class, 'destroy'])->name('event.un-attend');

    Route::get('events/{event}/user/{user}/qr', AttendEventQRController::class)->name('events.attend.qr');

    Route::put('events/{event}/user/{user}', [AttendEventController::class, 'store'])->name('events.attend.admin');

    Route::delete('events/{event}/user/{user}', [AttendEventController::class, 'destroy'])->name('events.un-attend.admin');

    Route::get('my-events', UserEventController::class)->name('my-event');

    Route::get('attendee/{user}', AttendeeController::class)->name('attendee.show');

    Route::get('profile', ProfileController::class)->name('profile');

    Route::prefix('settings')->group(function () {
        Route::get('account', [AccountSettingsController::class, 'show'])
            ->name('settings.account.show');
        Route::post('account', [AccountSettingsController::class, 'update'])
            ->name('settings.account.update');

        Route::get('interests', [InterestsSettingsController::class, 'show'])
            ->name('settings.interests.show');
        Route::put('interests', [InterestsSettingsController::class, 'update'])
            ->name('settings.interests.update');

        Route::get('privacy', [PrivacySettingsController::class, 'show'])
            ->name('settings.privacy.show');
        Route::put('privacy', [PrivacySettingsController::class, 'update'])
            ->name('settings.privacy.update');

        Route::get('notifications', [NotificationSettingsController::class, 'show'])
            ->name('settings.notifications.show');
        Route::put('notifications', [NotificationSettingsController::class, 'update'])
            ->name('settings.notifications.update');

        Route::get('help', HelpController::class)->name('help');

        Route::apiResource('bike', BikeController::class)
            ->only([
                'store',
                'update',
                'destroy',
            ]);

        Route::put('dream-bike', DreamBikeController::class)
            ->name('settings.dream-bike');

        Route::put('show-dream-bike', ShowDreamBikesController::class)
            ->name('settings.show-dream-bike');

        Route::put('show-my-bike', ShowMyBikesController::class)
            ->name('settings.show-my-bike');

        Route::post('answers', [AnswerController::class, 'store'])->name('answers.store');
    });

    Route::get("attendance/used", function () {
        return Inertia::render('Event/UsedAttendance');
    })->name('attendance.used');
});

Route::any('nova/language/{language}', function (Illuminate\Http\Request $request, $language) {
    $request->session()->put('locale', $language);
    session()->put('locale', $language);

    return redirect()->route('nova.pages.home');
})->name('nova.language');

Route::get('public/events', [PublicEventController::class, 'index'])->name('public.events.index');
Route::get('public/events/{event}', [PublicEventController::class, 'show'])->name('public.events.show');
