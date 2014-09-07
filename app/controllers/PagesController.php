<?php

class PagesController extends BaseController {


	public function home()//returns all client sites from ClientSites table
	{
		$clients = ClientSite::all();
		return View::make('index')->with('clients',$clients);
	}
	
	public function profile($siteName)//returns client and client feature info for profile
	{	
		$site = ClientSite::whereSitename($siteName)->first();//select * from clientSites where siteName = $siteName			
  		$id = $site['clientID'];//getting clientID for use in join query
		
		$forms = DB::table('features')->join('clientFeatures', function($join) use($id) 
        {
            $join->on( 'clientFeatures.featureID', '=', 'features.featureID')			
                 ->where('clientFeatures.clientID', '=', $id)
	             ->where('features.groupID', '=', 1);
		})
        ->get();
		
				$widgets = DB::table('features')->join('clientFeatures', function($join) use($id) 
        {
            $join->on( 'clientFeatures.featureID', '=', 'features.featureID')			
                 ->where('clientFeatures.clientID', '=', $id)
	             ->where('features.groupID', '=', 2);
		})
        ->get();
				 
		return View::make('profiles.show')->with('site',$site)->with('forms',$forms)->with('widgets',$widgets);	
				
	}
	
}