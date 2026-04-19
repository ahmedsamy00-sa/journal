<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;


class NewsCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function news(){
        return $this->hasMany(News::class);
    }
}
