<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
Route::group(['prefix' => 'adm'], function () {
    Route::get('/', 'AdminPanelController@index');
    Route::resource('barrios', 'NeighborhoodController');
    Route::get('barrios/{id}/delete', 'NeighborhoodController@destroy');
    Route::post('barrios/{id}/update', 'NeighborhoodController@update');
    Route::resource('categorias', 'CategoriesController');
    Route::get('categorias/{id}/delete', 'CategoriesController@destroy');
    Route::post('categorias/{id}/update', 'CategoriesController@update');
    Route::resource('subcategorias', 'SubcategoriesController');
    Route::get('subcategorias/{id}/delete', 'SubcategoriesController@destroy');
    Route::post('subcategorias/{id}/update', 'SubcategoriesController@update');

});