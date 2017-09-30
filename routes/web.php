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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('companies'  , 'CompaniesController' );
Route::resource('projects'   , 'ProjectsController'  );
Route::resource('roles'      , 'RolesController'     );
Route::resource('tasks'      , 'TasksController'     );
Route::resource('users'      , 'UsersController'     );


// Essa é uma outra forma de criação de rotas, aqui se define o metodo que irá pegar a url
// depois a url, qual cotroller e após o @ o metodo dentro do controller
// Route::get('/companies/index', 'CompaniesController@index');