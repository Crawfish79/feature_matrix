<?php
class ClientSiteController extends BaseController {
	
	//returns all client sites from ClientSites table
	public function showClients()
	{
		$clients = ClientSite::all();
		return View::make('index')->with('clients',$clients);
	}
	
	//returns client and client feature info for profile
	public function clientProfile($siteName)
	{	//select * from clientSites where siteName = $siteName
		$client = ClientSite::whereSitename($siteName)->first();			
  		$clientID = $client['clientID'];//getting clientID for use in join query
		//queries for retrieving features of each group for the selected client
		
		$clientFeatures = DB::table('features')->join('clientFeatures', function($join) use($clientID) 
        {
            $join->on( 'clientFeatures.featureID', '=', 'features.featureID')			
                 ->where('clientFeatures.clientID', '=', $clientID);
		})->get();
		
		$groupIDs = array();
		foreach ($clientFeatures as $c) {
    	$groupIDs[] = $c->groupID;
		}
		
		return View::make('profiles.clientProfiles')->with('client',$client)
													->with('groupIDs',$groupIDs)
													->with('clientFeatures',$clientFeatures);													
	}
	
	//add a site to the database
	public function create()
	{
	    return View::make('edit.create_site');
	}
	
	     //save the site to the database
	public function saveCreate()
	{
	     	
	    $input = Input::all();
	     		
	    $ClientSites = new ClientSite;
	    $ClientSites->siteName = $input['siteName'];
		$ClientSites->launchDate = $input['launchDate'];
	    $ClientSites->description = $input['description'];
				
	    $ClientSites->save();
	     		
	     		
	    return Redirect::action('ClientSiteController@showClients');
	 }
	
}

