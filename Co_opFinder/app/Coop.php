<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coop extends Model
{
    protected $fillable = ['coop_name',
                            'verified_status',
                            'coop_ref_num',
                            'est_date',
                            'coop_address',
                            'coop_city',
                            'coop_postcode',
                            'coop_state',
                            'coop_telephone',
                            'email',
                            'business_type',
                            'owner_id',
                            'address_address',
                            'address_latitude',
                            'address_longitude',
                        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class,'coop_id');
    }
}
