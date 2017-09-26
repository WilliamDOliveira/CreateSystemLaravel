<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name', 
        'email', 
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'city',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Estou definindo um relacionamento um para muitos
    * https://laravel.com/docs/5.5/eloquent-relationships#has-many-through
    * Agora posso acessar os dados dessa forma por exemplo
    * $comments = App\Post::find(1)->comments;
    * foreach ($comments as $comment) { } ou ainda
    * $comments = App\Post::find(1)->comments()->where('title', 'foo')->first();
    **/
    
    //esse usuário pode fazer muitos comentários
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    //esse usuário pode trabalhar em varias empresas
    public function companies(){
        return $this->hasMany('App\Company');
    }

    //Um usuário desempenha/pertence a/uma função
    public function role(){
        return $this->belongsTo('App\Role');
    }

    //Esse relacionamento liga user para task através de TaskUser
    public function tasks(){
        return $this->belongsToMany('App\Task');
    }

    //Esse relacionamento liga user para project através de ProjectUser
    public function projects(){
        return $this->belongsToMany('App\Project');
    }

}
