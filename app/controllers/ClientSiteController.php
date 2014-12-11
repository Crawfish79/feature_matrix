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
		})->orderBy('featureName')
		  ->get();
		
		//getting group ID's of client features to determine if a specific 
		//feature group is present in the array of features for a client
		$groupIDs = array();
		foreach ($clientFeatures as $c) 
		{
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
		
		$rules = array(
			'siteName'=>array('required', 'regex:/^([\da-z\.-]+)\.([a-z\.]{2,6})([\w \.-]*)*?$/'), 
		    'description'=>'required|min:5',
		    'launchDate'=>'required|date_format:"Y-m-d"'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		
		if ($validator->fails()) 
		{	//if validator fails and site is being updated(if clientID is assigned, it is being updated)
			if(isset($_POST['clientID']))
			{
				$site = Input::get('site');
				
				return View::make('edit.create_site')->withErrors($validator)->withInput(Input::all())->with('site',$site);
			} 
			//else a new site failed validation
			else
			{    	
	     		return Redirect::to('/site_register')->withErrors($validator)->withInput();	
			}	
		
		} 
		
		else 
		{	//check if clientID is present.. if so, update site.. else, create site
			if(isset($_POST['clientID']))
			{	//try catch checking for duplicate site name
				try
				{
					$clientID = Input::get('clientID');
					
					ClientSite::where('clientID','=', $clientID)
					->update(array(
							'siteName'=> Input::get('siteName'),
							'launchDate'=> Input::get('launchDate'),
							'description'=> Input::get('description')
							));
								
		   					$siteName = Input::get('siteName');
		    
		    				return Redirect::action('ClientSiteController@clientProfile', array($siteName))
		    				->with('status','<strong>'.$siteName.'</strong> updated successfully!');
				}
				
				catch(\Illuminate\Database\QueryException $e)
				{
					Session::flash('status','Site name already exist');
					return View::make('edit.create_site')->withInput(Input::all());
				}				
			}
			
			else
			{
				try
				{
					//create new site
		    		$ClientSites = new ClientSite;
		    		$ClientSites->siteName = Input::get('siteName');
					$ClientSites->launchDate = Input::get('launchDate');
		    		$ClientSites->description = Input::get('description');
					
		    		$ClientSites->save();
		     		
		    		$siteName = Input::get('siteName');
				
		    		return Redirect::action('ClientSiteController@clientProfile', array($siteName))
		    		->with('status','<strong>'.$siteName.'</strong> created successfully!');
				}
				
				catch(\Illuminate\Database\QueryException $e)
				{
					return Redirect::to('/site_register')->withInput()->with('status','Site Already Exist!');
				}
			}
		}
	}
	//function for editing a site
	public function edit()
	{
		$site = Input::get('siteName');
	    return View::make('edit.create_site')->withInput(Input::all())->with('site',$site);
	}

}

