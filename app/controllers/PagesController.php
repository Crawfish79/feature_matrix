<?php

class PagesController extends BaseController {

	//returns all client sites from ClientSites table
	public function home()
	{
		$clients = ClientSite::all();
		return View::make('index')->with('clients',$clients);
	}
	//returns client and client feature info for profile
	public function profile($siteName)
	{	//select * from clientSites where siteName = $siteName
		$client = ClientSite::whereSitename($siteName)->first();			
  		$clientID = $client['clientID'];//getting clientID for use in join query
		//queries for retrieving features of each group for the selected client
		
		$forms = DB::table('features')->join('clientFeatures', function($join) use($clientID) 
        {
            $join->on( 'clientFeatures.featureID', '=', 'features.featureID')			
                 ->where('clientFeatures.clientID', '=', $clientID)
	             ->where('features.groupID', '=', 1);
		})->get();
		
		$widgets = DB::table('features')->join('clientFeatures', function($join) use($clientID) 
        {
            $join->on( 'clientFeatures.featureID', '=', 'features.featureID')			
                 ->where('clientFeatures.clientID', '=', $clientID)
	             ->where('features.groupID', '=', 2);
		})->get();
				 
		return View::make('profiles.clientProfiles')->with('client',$client)->with('forms',$forms)->with('widgets',$widgets);	
				
	}
	//edit the clients features for selected group
	public function profileEditClientFeature()
	{	//use clientID and groupID for queries
		$group = Input::get('group');
		$siteName = Input::get('siteName');
		$clientID = Input::get('clientID');
		$groupID = Input::get('groupID');
		//queries for checking featureID values of 'clientFeatures' against 'features' to determine if checkbox is true or not
		
		//get all features from a particular group		
		$featuresOfGroup = DB::table('features')->where('groupID', '=', $groupID )->get();
		//get all features from a particular client -place featureID's in an array
		$clientFeatures = DB::table('clientFeatures')->where('clientID', '=', $clientID)->get();
		$clientFeatures_FeatureID = array_pluck($clientFeatures,'featureID');
		
		return View::make('edit.clientFeatureEdit')->with('featuresOfGroup',$featuresOfGroup)
										  ->with('clientFeatures_FeatureID',$clientFeatures_FeatureID)
										  ->with('siteName',$siteName)->with('group',$group);
	}
	
}