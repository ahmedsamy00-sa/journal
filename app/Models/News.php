<?php

namespace App\Models;

use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'image',
        'desc',
        'counter',
        'newsStatus',
        'newsCategory_id',
    ];

    public function newsCategory(){
        return $this->belongsTo(NewsCategory::class, 'newsCategory_id');
    }

    public function video(){
        return $this->hasMany(Video::class);
    }
    public function hashtags(){
        return $this->belongsToMany(Hashtag::class, 'news_hashtags');
    }
}
