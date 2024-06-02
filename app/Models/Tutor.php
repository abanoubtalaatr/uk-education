<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class Tutor  extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasFactory;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use InteractsWithMedia;

    protected $fillable = ['name', 'email', "what's_app_number", 'photo', 'password'];


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
