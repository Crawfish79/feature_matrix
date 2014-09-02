<?php

class PagesController extends BaseController {


	public function home()
	{
		$clients = ClientSite::all();
		return View::make('index')->with('clients',$clients);
	}
	
	public function profile($siteName)
	{	
		$site = ClientSite::whereSitename($siteName)->first();			
		return View::make('profiles.show')->with('site',$site);					
	}
	
}