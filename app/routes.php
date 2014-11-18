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

//login
Route::get('/login','SessionsController@create');
Route::get('/logout','SessionsController@destroy');
Route::resource('sessions','SessionsController');

//password reminder
Route::controller('password','RemindersController');

//check if user is authorized before routing
Route::group(array('before' => 'auth'), function() 
{
	//User
	Route::get('users/create','UsersController@register');
	Route::post('users/create','UsersController@create');
	
	//ClientSite	
	Route::get('/','ClientSiteController@showClients');
	Route::get('/ClientProfile/{siteName}','ClientSiteController@clientProfile');
	//ClientSite-register/edit
	Route::get('/site_register','ClientSiteController@create');
	Route::post('/site_register','ClientSiteController@saveCreate');
	Route::post('/site_edit','ClientSiteController@edit');
	
	//FeatureGroups
	Route::get('/GroupProfile/{groupName}','FeatureGroupController@featureGroupProfile');
	Route::post('/FeatureGroup/feature_create','FeatureGroupController@featureGroupCreate');
	Route::post('/','FeatureGroupController@featureGroupDelete');
	
	//Features
	Route::any('/FeatureSearch','FeatureController@featureSearch');
	Route::post('/GroupProfile/feature_delete','FeatureController@featureDelete');
	Route::post('/GroupProfile/feature_create','FeatureController@featureCreate');
	
	//ClientFeatures
	Route::post('/ClientFeatureEdit','ClientFeatureController@clientFeatureEdit');
	Route::post('/ClientFeatureUpdate','ClientFeatureController@clientFeatureUpdate');

});
//using view composer to bind featureGroup data to the listed views
View::composer(['layouts.default','profiles.clientProfiles'], function($view)
	{
		$featureGroups = FeatureGroup::all();
		$view->with('featureGroups',$featureGroups);				
	});

	