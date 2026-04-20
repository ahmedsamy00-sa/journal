<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site_link extends Model
{
    protected $fillable = [
        'name',
        'url',
        'site_id'
    ];

    public function site_info(){
        return $this->belongsTo(Site_info::class);
    }
}
