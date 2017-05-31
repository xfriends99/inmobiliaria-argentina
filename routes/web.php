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

Route::get('/thankyou', [
    'as' => 'thankyou',
    'uses' => 'HomeController@thankyou'
]);
