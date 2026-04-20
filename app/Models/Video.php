<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'video_url',
        'videoStatus',
        'news_id'
    ];

    public function news(){
        return $this->belongsTo(News::class);
    }
}
