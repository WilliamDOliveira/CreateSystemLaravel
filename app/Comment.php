<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'id',
        'body',
        'url',
        'commentable_id',
        'commentable_type',
        'user_id'
    ];
}
