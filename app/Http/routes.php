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




/*
Route::get('/', function () {
    return view('public_krt.index');
});*/

Route::get('/', 'SessionController@index');


Route::auth();

Route::group(['middleware' => ['auth']], function() {



    Route::get('/home', 'HomeController@index');
   // Route::get('/', 'SessionController@index');

    Route::resource('users','UserController');
    Route::resource('news','NewsController');
    Route::resource('local','LocalController');
    Route::resource('registro','UsuarioController');

    Route::resource('comentarios','ComentarioController');
    Route::resource('eventos','EventoController');
    Route::resource('ofertas','OfertaController');
    Route::resource('preguntas','PreguntaController');
    Route::resource('publicidades','PublicidadController');
    Route::resource('rankings','RankingController');
    Route::resource('rutas','RutaController');


    Route::get('votacion/{id}',['as'=>'votacion.show','uses'=>'VotingController@show']);

    Route::get('rutas',['as'=>'ruta.index','uses'=>'RutaController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('rutas/create',['as'=>'ruta.create','uses'=>'RutaController@create','middleware' => ['permission:item-create']]);
    Route::post('rutas/create',['as'=>'ruta.store','uses'=>'RutaController@store','middleware' => ['permission:item-create']]);
    Route::get('rutas/{id}',['as'=>'ruta.show','uses'=>'RutaController@show']);
    Route::get('rutas/{id}/edit',['as'=>'ruta.edit','uses'=>'RutaController@edit','middleware' => ['permission:item-edit']]);
    Route::patch('rutas/{id}',['as'=>'ruta.update','uses'=>'RutaController@update','middleware' => ['permission:item-edit']]);
    Route::delete('rutas/{id}',['as'=>'ruta.destroy','uses'=>'RutaController@destroy','middleware' => ['permission:item-delete']]);

    Route::get('rankings',['as'=>'ranking.index','uses'=>'RankingController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('rankings/create',['as'=>'ranking.create','uses'=>'RankingController@create','middleware' => ['permission:item-create']]);
    Route::post('rankings/create',['as'=>'ranking.store','uses'=>'RankingController@store','middleware' => ['permission:item-create']]);
    Route::get('rankings/{id}',['as'=>'ranking.show','uses'=>'RankingController@show']);
    Route::get('rankings/{id}/edit',['as'=>'ranking.edit','uses'=>'RankingController@edit','middleware' => ['permission:item-edit']]);
    Route::patch('rankings/{id}',['as'=>'ranking.update','uses'=>'RankingController@update','middleware' => ['permission:item-edit']]);
    Route::delete('rankings/{id}',['as'=>'ranking.destroy','uses'=>'RankingController@destroy','middleware' => ['permission:item-delete']]);

    Route::get('publicidades',['as'=>'publicidad.index','uses'=>'PublicidadController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('publicidades/create',['as'=>'publicidad.create','uses'=>'PublicidadController@create','middleware' => ['permission:item-create']]);
    Route::post('publicidades/create',['as'=>'publicidad.store','uses'=>'PublicidadController@store','middleware' => ['permission:item-create']]);
    Route::get('publicidades/{id}',['as'=>'publicidad.show','uses'=>'PublicidadController@show']);
    Route::get('publicidades/{id}/edit',['as'=>'publicidad.edit','uses'=>'PublicidadController@edit','middleware' => ['permission:item-edit']]);
    Route::patch('publicidades/{id}',['as'=>'publicidad.update','uses'=>'PublicidadController@update','middleware' => ['permission:item-edit']]);
    Route::delete('publicidades/{id}',['as'=>'publicidad.destroy','uses'=>'PublicidadController@destroy','middleware' => ['permission:item-delete']]);

    Route::get('preguntas',['as'=>'pregunta.index','uses'=>'PreguntaController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('preguntas/create',['as'=>'pregunta.create','uses'=>'PreguntaController@create','middleware' => ['permission:item-create']]);
    Route::post('preguntas/create',['as'=>'pregunta.store','uses'=>'PreguntaController@store','middleware' => ['permission:item-create']]);
    Route::get('preguntas/{id}',['as'=>'pregunta.show','uses'=>'PreguntaController@show']);
    Route::get('preguntas/{id}/edit',['as'=>'pregunta.edit','uses'=>'PreguntaController@edit','middleware' => ['permission:item-edit']]);
    Route::patch('preguntas/{id}',['as'=>'pregunta.update','uses'=>'PreguntaController@update','middleware' => ['permission:item-edit']]);
    Route::delete('preguntas/{id}',['as'=>'pregunta.destroy','uses'=>'PreguntaController@destroy','middleware' => ['permission:item-delete']]);

    Route::get('ofertas',['as'=>'oferta.index','uses'=>'OfertaController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('ofertas/create',['as'=>'oferta.create','uses'=>'OfertaController@create','middleware' => ['permission:item-create']]);
    Route::post('ofertas/create',['as'=>'oferta.store','uses'=>'OfertaController@store','middleware' => ['permission:item-create']]);
    Route::get('ofertas/{id}',['as'=>'oferta.show','uses'=>'OfertaController@show']);
    Route::get('ofertas/{id}/edit',['as'=>'oferta.edit','uses'=>'OfertaController@edit','middleware' => ['permission:item-edit']]);
    Route::patch('ofertas/{id}',['as'=>'oferta.update','uses'=>'OfertaController@update','middleware' => ['permission:item-edit']]);
    Route::delete('ofertas/{id}',['as'=>'oferta.destroy','uses'=>'OfertaController@destroy','middleware' => ['permission:item-delete']]);

    Route::get('eventos',['as'=>'evento.index','uses'=>'EventoController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('eventos/create',['as'=>'evento.create','uses'=>'EventoController@create','middleware' => ['permission:item-create']]);
    Route::post('eventos/create',['as'=>'evento.store','uses'=>'EventoController@store','middleware' => ['permission:item-create']]);
    Route::get('eventos/{id}',['as'=>'evento.show','uses'=>'EventoController@show']);
    Route::get('eventos/{id}/edit',['as'=>'evento.edit','uses'=>'EventoController@edit','middleware' => ['permission:item-edit']]);
    Route::patch('eventos/{id}',['as'=>'evento.update','uses'=>'EventoController@update','middleware' => ['permission:item-edit']]);
    Route::delete('eventos/{id}',['as'=>'evento.destroy','uses'=>'EventoController@destroy','middleware' => ['permission:item-delete']]);

    Route::get('comentarios',['as'=>'comentario.index','uses'=>'ComentarioController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('comentarios/create',['as'=>'comentario.create','uses'=>'ComentarioController@create','middleware' => ['permission:item-create']]);
    Route::post('comentarios/create',['as'=>'comentario.store','uses'=>'ComentarioController@store','middleware' => ['permission:item-create']]);
    Route::get('comentarios/{id}',['as'=>'comentario.show','uses'=>'ComentarioController@show']);
    Route::get('comentarios/{id}/edit',['as'=>'comentario.edit','uses'=>'ComentarioController@edit','middleware' => ['permission:item-edit']]);
    Route::patch('comentarios/{id}',['as'=>'comentario.update','uses'=>'ComentarioController@update','middleware' => ['permission:item-edit']]);
    Route::delete('comentarios/{id}',['as'=>'comentario.destroy','uses'=>'ComentarioController@destroy','middleware' => ['permission:item-delete']]);


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







