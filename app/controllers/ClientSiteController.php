<?php
// app/controlers/ClientSiteController.php

class ClientSiteController extends BaseController

{
    public function showClients()
{
$clients = ClientSite::all();
return View::make('index')->with('clients',$clients);
}
//returns client and client feature info for profile
public function clientProfile($siteName)
{   //select * from clientSites where siteName = $siteName
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
         
         public function create()
         {
                return View::make('edit.create');
         }
         
         public function edit( ClientSite $clientsite )
        
         {
                return View::make('edit.edit', compact('clientsite'));
         }
         public function doEdit()
         {
            $clientsite = clientsite::findOrFail(Input::get('clientID'));
            $clientsite->siteName = Input::get('siteName');
            $clientsite->description = Input::get('description');
            $clientsite->launchDate = Input::get('launchDate');
            $clientsite->save();
            
            return Redirect::action('ClientSiteController@showClients');
         }
        
         public function saveCreate()
         {
                $input = Input::all();
                
                $clientsite = new ClientSite;
                $clientsite->siteName = $input['siteName'];
                $clientsite->description = $input['description'];
                $clientsite->launchDate = $input['launchDate'];
                $clientsite->save();
                
                return Redirect::action('ClientSiteController@showClients');
            }
         public function show($clientID)
         {
            $clientsite = Clientsite::find($clientID);
            return View::make('clientsite', compact('clientsite'));
         }
}
