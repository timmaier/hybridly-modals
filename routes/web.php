<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return hybridly('welcome');
});

Route::get('/sign-in', function() {
    return hybridly('sign-in', [
        'data' => [
            'title' => 'Login',
            'description' => 'Login to your account'
        ]
    ])->base('welcome');
});


Route::get('/sign-up', function() {
    logger('Sign up hit');

    return hybridly('sign-up', [
        'data' => [
            'title' => 'Sign up',
            'description' => 'Create an account'
        ]
    ])->base('welcome');
});