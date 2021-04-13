<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['commenter_id',
                            'coop_id',
                            'comment_text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coop()
    {
        return $this->belongsTo(Coop::class);
    }
}
