<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'days',
        'hours',
        'project_id',
        'user_id',
        'company_id'
    ];

    //essa tarefa pertence a um usuário
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    //essa tarefa pertence a um projeto
    public function project(){
        return $this->belongsTo('App\Project');
    }
    
    //essa tarefa pertence a uma empresa
    public function company(){
        return $this->belongsTo('App\Company');
    }

    //Esse relacionamento liga user para task através de TaskUser
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
