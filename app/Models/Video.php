<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

use Spatie\MediaLibrary\InteractsWithMedia;

class Video extends Model implements HasMedia
{
    use HasFactory;

    use InteractsWithMedia;


        protected $fillable = ['topic_id', 'title', 'description', 'video'];


        public function topic()
        {
            return $this->belongsTo(Topic::class);
        }
}
