<?php

class ClientFeatureController extends BaseController {

	//edit the clients features for selected group
	public function clientFeatureEdit()
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
												  ->with('siteName',$siteName)->with('group',$group)->with('clientID',$clientID);
	}


	//function for create update and delete
	public function clientFeatureUpdate(){
		
		$clientID = Input::get('clientID');
		$features = Input::get('features');
		$prevFeatures = Input::get('prevFeatures');
		

		if(isset($_POST['features'])){
			foreach ($features as $feature) {
								
					ClientFeature::updateOrCreate(array('clientID'=> $clientID,'featureID'=> $feature));				
			}
			
		}
							
		if(isset($_POST['prevFeatures'])){
			
			foreach ($prevFeatures as $prevFeature) {
				
				if (!(empty($_POST['features']))){
									
					if (!(in_array($prevFeature, $features))){						
						DB::table('clientFeatures')->where('clientID', '=', $clientID) ->where('featureID', '=', $prevFeature)->delete();
					}
					
				}else{
					
					DB::table('clientFeatures')->where('clientID', '=', $clientID) ->where('featureID', '=', $prevFeature)->delete();
					
				}				
			}
		}
						
		return View::make('edit.clientFeatureEdit');				
	
	}
	
	
	
}

