<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //se users não existir então cria
    public function up()
    {
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('first_name')->nullable();
                $table->string('middle_name')->nullable();
                $table->string('last_name')->nullable();            
                $table->string('city')->nullable();     
                $table->integer('role_id')->unsigned()->default(3);
                $table->rememberToken();
                $table->timestamps();
            });
        }

    }
    /*
    Aqui em table role_id estou definindo um valor defaul em 3, e em role que é a função eu vou definir
    por exemplo que role 3 é um user, 2 pode ser um moderador e 1 o admin por exemplo, assim posso controlar
    os cargos/funções/papel de cada um para acessar e editar determinados conteudos
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
