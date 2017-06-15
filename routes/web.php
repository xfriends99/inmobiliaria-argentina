<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('/signin', [
    'as' => 'signin',
    'uses' => 'Auth\AuthController@getLoginFrontend'
]);

Route::post('/login', [
    'as' => 'login',
    'uses' => 'Auth\AuthController@postLoginFrontend'
]);

Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'Auth\AuthController@getLogout'
]);

Route::get('/signup', [
    'as' => 'signup',
    'uses' => 'Auth\AuthController@getRegister'
]);

Route::post('/signup/store', [
    'as' => 'signup.register',
    'uses' => 'Auth\AuthController@postRegister'
]);

Route::get('/inmobiliarias', [
    'as' => 'inmobiliarias',
    'uses' => 'HomeController@inmobiliarias'
]);

Route::get('/carrito', [
    'as' => 'carrito',
    'uses' => 'UserShoppingCarController@index'
]);

Route::post('{id}/carrito/add', [
    'as' => 'carrito.add',
    'uses' => 'UserShoppingCarController@store'
]);

Route::post('{id}/carrito/delete', [
    'as' => 'carrito.delete',
    'uses' => 'UserShoppingCarController@delete'
]);

Route::get('/nosotros', [
    'as' => 'nosotros',
    'uses' => 'HomeController@nosotros'
]);

Route::get('/{id}/propiedad', [
    'as' => 'propiedad',
    'uses' => 'PropertyController@show'
]);

Route::post('/{id}/propiedad/contacto', [
    'as' => 'propiedad.contacto',
    'uses' => 'PropertyController@contact'
]);

Route::get('/search', [
    'as' => 'search',
    'uses' => 'SearchController@index'
]);

Route::get('/search/{ord?}', [
    'as' => 'search',
    'uses' => 'SearchController@index'
]);

Route::get('/thankyou', [
    'as' => 'thankyou',
    'uses' => 'HomeController@thankyou'
]);

//Admin users

Route::get('/admin/signin', [
    'as' => 'signin.admin',
    'uses' => 'Auth\AuthController@getLogin'
]);

Route::post('/admin/login', [
    'as' => 'login.admin',
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('/admin', [
    'as' => 'dashboard',
    'uses' => 'DashboardController@index',
    'middleware' => ['auth']
]);

Route::get('users', [
    'as' => 'user.index',
    'uses' => 'UserController@index',
    'middleware' => ['auth']
]);

Route::get('users/{id}/show', [
    'as' => 'user.show',
    'uses' => 'UserController@show',
    'middleware' => ['auth']
]);

Route::delete('users/{id}/delete', [
    'as' => 'user.delete',
    'uses' => 'UserController@delete',
    'middleware' => ['auth']
]);

Route::get('users/create', [
    'as' => 'user.create',
    'uses' => 'UserController@create',
    'middleware' => ['auth']
]);

Route::post('users/store', [
    'as' => 'user.store',
    'uses' => 'UserController@store',
    'middleware' => ['auth']
]);

Route::get('users/{id}/edit', [
    'as' => 'user.edit',
    'uses' => 'UserController@edit',
    'middleware' => ['auth']
]);

Route::put('users/{id}/update', [
    'as' => 'user.update',
    'uses' => 'UserController@update',
    'middleware' => ['auth']
]);

Route::get('quicksearch', [
    'as' => 'quicksearch',
    'uses' => 'SearchController@quicksearch'
]);

Route::get('/login', function(){
   return redirect()->route('signin.admin');
});