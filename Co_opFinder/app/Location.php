<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{   
    protected $fillable = [
        'locationField',
        'coop_id',
        'address_latitude',
        'address_longitude',
    ];
    
    public function coop()
    {
        $this->belongsTo(Coop::class);
    }
}
