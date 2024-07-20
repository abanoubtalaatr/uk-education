<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['subscription_id', 'name', 'description', 'image','pdf','is_paid','video'];

    protected $casts = [
        'is_paid' => 'boolean'
    ];
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
