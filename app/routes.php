<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'PagesController@home');
Route::get('ClientProfile/{siteName}', 'PagesController@profile');
Route::post('FeatureGroupProfile','PagesController@groupProfile');
Route::post('FeatureGroupFeatureDelete','PagesController@groupProfileFeatureDelete');
Route::post('FeatureGroupFeatureAdd','PagesController@featureGroupFeatureAdd');
Route::post('ClientFeatureEdit', 'PagesController@profileEditClientFeature');
Route::get('/create','PagesController@create');
Route::post('/create', 'PagesController@saveCreate');

