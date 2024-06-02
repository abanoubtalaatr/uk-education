<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionTutor extends Model
{
    use HasFactory;

    protected $table = 'subscription_tutor';

    protected $guarded = [];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
