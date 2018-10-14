<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    return 'Hola mundo';
});

