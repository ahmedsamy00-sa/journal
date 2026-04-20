<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site_contact extends Model
{
    protected $fillable = [
        'icon',
        'type',
        'value',
        'site_id'
    ];

    public function site_info(){
        return $this->belongsTo(Site_info::class);
    }
}
