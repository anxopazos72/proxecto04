<?php

Route::get('/', 'PostController@getIndex')->name('index');
Route::get('/quienes', function (){
	return view('estaticos/quienes');
})->name('quienes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/autor/post', 'HomeController@formularioPost')->name('post.formulario');
Route::post('/autor/post', 'HomeController@crearPost')->name('post.formulario');
Route::get('/autor/post/detalle/{id}', 'HomeController@verPost')->name('post.detalle');
Route::get('/autor/post/editar/{id}', 'HomeController@editarPost')->name('post.editar');
Route::post('/autor/post/editar/{id}', 'HomeController@actualizarPost')->name('post.actualizar');
Route::get('/autor/post/borrar/{id}', 'HomeController@borrarPost')->name('post.borrarsoft');
Route::get('/post/leer/{post_id}', 'PostController@verPostEntero')->name('post.leer');
Route::get('/user', 'HomeController@verUsuario')->name('user');
Route::post('/user/{id}', 'HomeController@actualizarUsuario')->name('user.actualizar');
Route::get('/seccion/{id}', 'PostController@verSeccion')->name('seccion');
Route::post('/comentario', 'PostController@crearComentario')->name('post.comentario');
Route::get('/autor/comentario', 'HomeController@verComentarios')->name('ver.comentario');
Route::get('/autor/comentario/detalle/{id}', 'HomeController@verComentario')->name('comentario.detalle');
Route::get('/autor/comentario/aprobar/{id}', 'HomeController@aprobarComentario')->name('comentario.aprobar');
Route::get('/autor/comentario/borrar/{id}', 'HomeController@borrarComentario')->name('comentario.borrar');
Route::get('/autor/papelera', 'HomeController@verPapelera')->name('ver.papelera');
Route::get('/autor/papelera/detalle/{id}', 'HomeController@accionPapelera')->name('accion.papelera');
Route::get('/autor/papelera/restaurar/{id}', 'HomeController@restaurarPost')->name('post.restaurar');
Route::get('/autor/papelera/borrar/{id}', 'HomeController@borrarPermanente')->name('post.borrarhard');
Route::post('/buscar', 'PostController@buscar')->name('post.buscar');
Route::get('/contacto', 'ContactController@crear')->name('contacto.crear');
Route::post('/contacto', 'ContactController@guardar')->name('contacto.guardar');
Route::get('/galeria/{id}', 'PostController@verGaleria')->name('galeria.ver');

