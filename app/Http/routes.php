<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');

    Route::resource('users','UserController');
    Route::resource('news','NewsController');
    Route::resource('local','LocalController');
    Route::resource('registro','UsuarioController');


    Route::get('votacion/{id}',['as'=>'votacion.show','uses'=>'VotingController@show']);


    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

    Route::get('itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);
    Route::post('itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);
    Route::get('itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);
    Route::get('itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);
    Route::patch('itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);
    Route::delete('itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);

    Route::get('news',['as'=>'news.index','uses'=>'NewsController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('news/create',['as'=>'news.create','uses'=>'NewsController@create','middleware' => ['permission:item-create']]);
    Route::post('news/create',['as'=>'news.store','uses'=>'NewsController@store','middleware' => ['permission:item-create']]);
    Route::get('news/{id}',['as'=>'news.show','uses'=>'NewsController@show']);
    Route::get('news/{id}/edit',['as'=>'news.edit','uses'=>'NewsController@edit','middleware' => ['permission:item-edit']]);
    Route::patch('news/{id}',['as'=>'news.update','uses'=>'NewsController@update','middleware' => ['permission:item-edit']]);
    Route::delete('news/{id}',['as'=>'news.destroy','uses'=>'NewsController@destroy','middleware' => ['permission:item-delete']]);

    Route::get('local',['as'=>'locales.index','uses'=>'LocalController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('local/create',['as'=>'local.create','uses'=>'LocalController@create','middleware' => ['permission:item-create']]);
    Route::post('local/create',['as'=>'local.store','uses'=>'LocalController@store','middleware' => ['permission:item-create']]);
    Route::get('local/{id}',['as'=>'local.show','uses'=>'LocalController@show']);
    Route::get('local/{id}/edit',['as'=>'local.edit','uses'=>'LocalController@edit','middleware' => ['permission:item-edit']]);
    Route::patch('local/{id}',['as'=>'local.update','uses'=>'LocalController@update','middleware' => ['permission:item-edit']]);
    Route::delete('local/{id}',['as'=>'local.destroy','uses'=>'LocalController@destroy','middleware' => ['permission:item-delete']]);
});
/*
    Route::get('/', function () {
        return view('welcome');
    });
// Authentication routes...
    Route::get('sesion', [
        'uses'=>'Auth\AuthController@showLoginForm',
        'as' =>'login'
    ]);
    Route::post('sesion', 'Auth\AuthController@login');
    Route::get('logout',[
        'uses'=>'Auth\AuthController@logout',
        'as'=>'logout'
    ]);

// Registration routes...
    Route::get('registrar', [
        'uses'=>'Auth\AuthController@showRegistrationForm',
        'as'=> 'register'

    ]);
    Route::post('register', 'Auth\AuthController@register');

Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', 'Auth\PasswordController@reset');

  Route::get('/home', 'HomeController@index');
*/







