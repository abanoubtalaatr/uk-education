<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'city_id',
        'password',
        'onboarding_step',
        'job_title',
        'birth_date',
        'gender',
        'mobile',
        'whats_app_number',
        'otp',
        'otp_token',
        'profile_image_url',
        'gmc_number',
        'exam_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'phone_code',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
        'is_admin',
        'exam_confirmation_email',
        'exam_confirmation_one',
        'exam_confirmation_two',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'birth_date' => 'date',
            'password' => 'hashed',
            'completed_onboarding' => 'boolean',
            'exam_date' => 'datetime'
        ];
    }

    /**
     * Register the media conversions.
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Fit::Contain, 300, 300);
    }

    /**
     * Register the media collections.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_picture')->singleFile();

        $this->addMediaCollection('exam_confirmation_email');

        $this->addMediaCollection('exam_confirmation_one')
            ->singleFile();

        $this->addMediaCollection('exam_confirmation_two')
            ->singleFile();
    }

    /**
     * Get the profile photo for the user.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function profilePhotoUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->getFirstMediaUrl('profile_picture')
        );
    }

    public function examConfirmationEmail(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->getFirstMediaUrl('exam_confirmation_email')
        );
    }

    public function examConfirmationOne(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->getFirstMediaUrl('exam_confirmation_one')
        );
    }

    public function examConfirmationTwo(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->getFirstMediaUrl('exam_confirmation_two')
        );
    }

    /**
     * Get the isAdmin attribute.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->hasRole('super-admin')
        );
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function courses()
    {
        return $this->bookings()->where('bookable_type', Course::class);
    }

    public function crashCourses()
    {
        return $this->bookings()->where('bookable_type', CrashCourse::class);
    }

    public function mockExams()
    {
        return $this->bookings()->where('bookable_type', MockExam::class);
    }

    public function subscriptions()
    {
        return $this->bookings()->where('bookable_type', Subscription::class);
    }
}
