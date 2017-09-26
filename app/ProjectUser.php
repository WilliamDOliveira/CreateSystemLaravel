<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //
     protected $fillable = [
        'id',
        'user_id',
        'project_id'
    ];
}
