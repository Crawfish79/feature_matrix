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
Route::model('clientsite', 'ClientSite');
Route::get('/','ClientSiteController@showClients');
Route::get('/create','ClientSiteController@create');
Route::get('/edit/{clientsite}','ClientSiteController@edit');
Route::post('/edit', 'ClientSiteController@doEdit');
Route::get('/delete/{clientsite}','ClientSiteController@delete');
Route::post('/delete', 'ClientSiteController@doDelete');
// listen for when we POST to the create page and then call saveCreate action in the ClientSitessController to handle the form.
Route::post('/create', 'ClientSiteController@saveCreate');
Route::get('clientsite/{clientID}', 'ClientSiteController@show')->where('clientID', '\d+');


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

	
