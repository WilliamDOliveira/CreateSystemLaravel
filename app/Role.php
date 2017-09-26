<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
     protected $fillable = [
        'id',
        'name'
    ];

    //uma função pode ter vários usuários
    public function users(){
        return $this->hasMany('App\User');
    }
}
