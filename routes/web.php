<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('/signin', [
    'as' => 'signin',
    'uses' => 'HomeController@signin'
]);

Route::get('/signup', [
    'as' => 'signup',
    'uses' => 'HomeController@signup'
]);

Route::get('/inmobiliarias', [
    'as' => 'inmobiliarias',
    'uses' => 'HomeController@inmobiliarias'
]);

Route::get('/carrito', [
    'as' => 'carrito',
    'uses' => 'HomeController@carrito'
]);

Route::get('/carrito', [
    'as' => 'carrito',
    'uses' => 'HomeController@carrito'
]);

Route::get('/nosotros', [
    'as' => 'nosotros',
    'uses' => 'HomeController@nosotros'
]);

Route::get('/propiedad', [
    'as' => 'propiedad',
    'uses' => 'HomeController@propiedad'
]);

Route::get('/thankyou', [
    'as' => 'thankyou',
    'uses' => 'HomeController@thankyou'
]);
