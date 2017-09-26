<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
     protected $fillable = [
        'id',
        'name',
        'description',
        'user_id'
    ];

    //A empresa pertence a um usuário, usuário [1,1]
    //Para se criar a empresa é preciso ter um usuário, se não o banco não cria a empresa
    public function user(){
        return $this->belongsTo('App\User');
    }    

    //Uma empresa tem varios projetos
    public function projects(){
        return $this->hasMany('App\Project');
    }

}

