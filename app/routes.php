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

	
//ClientSite	
Route::get('/','ClientSiteController@showClients');
Route::get('/ClientProfile/{siteName}','ClientSiteController@clientProfile');
Route::get('/create','ClientSiteController@create');
Route::post('/create','ClientSiteController@saveCreate');

//FeatureGroups
Route::get('/GroupProfile/{groupName}','FeatureGroupController@featureGroupProfile');
Route::post('/FeatureGroup/feature_create','FeatureGroupController@featureGroupCreate');
Route::post('/','FeatureGroupController@featureGroupDelete');

//Features
Route::post('/GroupProfile/feature_delete','FeatureController@featureDelete');
Route::post('/GroupProfile/feature_create','FeatureController@featureCreate');

//ClientFeatures
Route::post('/ClientFeatureEdit','ClientFeatureController@clientFeatureEdit');
Route::post('/ClientFeatureUpdate','ClientFeatureController@clientFeatureUpdate');


//using view composer to bind featureGroup data to the listed views
View::composer(['layouts.default','profiles.clientProfiles'], function($view)
	{
		$featureGroups = FeatureGroup::all();
		$view->with('featureGroups',$featureGroups);				
	});

	