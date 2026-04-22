<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site_info extends Model
{
    protected $fillable = [
        'logo',
        'icon',
        'desc',
        'lat',
        'lng'
    ];

    public function links(){
        return $this->hasMany(Site_link::class);
    }
    public function contacts(){
        return $this->hasMany(Site_contact::class);
    }
}
