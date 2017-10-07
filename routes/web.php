<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/' , 'CompaniesController@index');
//Definindo nova rota de Home quando criar a index descomente acima

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//middleware | criando gupo de segurança, precisam estar logados
Route::middleware( ['auth'] )->group(function () {
    Route::resource('companies'  , 'CompaniesController' );
    //Aqui precisou criar essa rota porque está passando id e saindo dos parametros do resource
    Route::get('projects/create/{company_id?}'   , 'ProjectsController@create'  );
    Route::resource('projects'   , 'ProjectsController'  );
    Route::resource('roles'      , 'RolesController'     );
    Route::resource('tasks'      , 'TasksController'     );
    Route::resource('users'      , 'UsersController'     );
    Route::resource('comments'   , 'CommentsController'  );
});


// Essa é uma outra forma de criação de rotas, aqui se define o metodo que irá pegar a url
// depois a url, qual cotroller e após o @ o metodo dentro do controller
// Route::get('/companies/index', 'CompaniesController@index');