<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class Tutor extends Authenticatable implements HasMedia
{
    use HasFactory;
    use HasApiTokens;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use InteractsWithMedia;

    protected $fillable = ['name', 'email', "whats_app_number", 'photo', 'password'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Automatically hash the password attribute when setting it.
     *
     * @param  string  $value
     * @return void
     */
    

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function crashCourses()
    {
        return $this->belongsToMany(CrashCourse::class);
    }

    public function mockExams()
    {
        return $this->belongsToMany(MockExam::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }
}
