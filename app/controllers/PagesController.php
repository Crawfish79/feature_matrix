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
		
		$gadgets = DB::table('features')->join('clientFeatures', function($join) use($clientID) 
        {
            $join->on( 'clientFeatures.featureID', '=', 'features.featureID')			
                 ->where('clientFeatures.clientID', '=', $clientID)
	             ->where('features.groupID', '=', 3);
		})->get();
		
		$maps = DB::table('features')->join('clientFeatures', function($join) use($clientID) 
        {
            $join->on( 'clientFeatures.featureID', '=', 'features.featureID')			
                 ->where('clientFeatures.clientID', '=', $clientID)
	             ->where('features.groupID', '=', 4);
		})->get();
				 
		$tools = DB::table('features')->join('clientFeatures', function($join) use($clientID) 
        {
            $join->on( 'clientFeatures.featureID', '=', 'features.featureID')			
                 ->where('clientFeatures.clientID', '=', $clientID)
	             ->where('features.groupID', '=', 5);
		})->get();

		return View::make('profiles.clientProfiles')->with('client',$client)
													->with('forms',$forms)
													->with('widgets',$widgets)
													->with('gadgets',$gadgets)
													->with('maps',$maps)
													->with('tools',$tools);	
				
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
	
	public function groupProfile()
	{
		$groupName = Input::get('groupName');
		$groupID = Input::get('groupID');
		$featuresOfGroup = DB::table('features')->where('groupID','=', $groupID )->get();
		return View::make('profiles.featureGroupProfile')->with('groupName',$groupName)
														 ->with('groupID',$groupID)
														 ->with('featuresOfGroup',$featuresOfGroup);
				
	}
	
	public function groupProfileFeatureDelete()
	{

			$featureID = $_POST['featureID'];
			$featureDelete = DB::table('features')->where('featureID','=',$featureID)->delete();
			return View::make('profiles.featureGroupProfile')->with('featureID',$featureID);

		
	}

	public function featureGroupFeatureAdd()
	{
		$groupName = Input::get('groupName');	
		$groupID = Input::get('groupID');
				
		if(!empty($_POST['featureName'])){
			$featureName = $_POST['featureName'];
			$featureAdd = DB::table('features')->insertGetId(array('groupID' => $groupID, 'featureName' => $featureName));
			return View::make('edit.featureGroupFeatureAdd');
		}else{
			return View::make('edit.featureGroupFeatureAdd')->with('groupName',$groupName)->with('groupID',$groupID);
		}
	}

}