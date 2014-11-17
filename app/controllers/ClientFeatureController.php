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
		$featuresOfGroup = Feature::where('groupID', '=', $groupID )->orderBy('featureName')->get();
		//get all features from a particular client -place featureID's in an array
		$clientFeatures = ClientFeature::where('clientID', '=', $clientID)->get();
		$clientFeatures_FeatureID = array_pluck($clientFeatures,'featureID');
		
		return View::make('edit.clientFeatureEdit')->with('featuresOfGroup',$featuresOfGroup)
												  ->with('clientFeatures_FeatureID',$clientFeatures_FeatureID)
												  ->with('clientFeatures',$clientFeatures)
												  ->with('siteName',$siteName)->with('group',$group)->with('clientID',$clientID);
	}


	//function for create update and delete
	public function clientFeatureUpdate(){
		
		$clientID = Input::get('clientID');
		$features = Input::get('features');
		$prevFeatures = Input::get('prevFeatures');
		$siteName = Input::get('siteName');
			
		//features array check-array of feature ids(checkbox's) and textarea input
		if(!(empty($_POST['features']))){
			
			for($i=0;$i < count($features);$i++) {
				//if feature id(checkbox) is first.. do update. textarea input follows checkbox input
				if (is_numeric($features[$i]))	{
					
					ClientFeature::updateOrCreate(array('clientID'=> $clientID,'featureID'=> $features[$i]));
					
					$i++;
					
					ClientFeature::where('clientID','=', $clientID)
								->where('featureID','=', $features[$i-1])
								->update(array('clientFeatureNote'=> $features[$i]));

			    }//endif
			}//endfor			
		}//endif
		
		//checking initial features(array) before delete					
		if(!(empty($_POST['prevFeatures']))){
			
			foreach ($prevFeatures as $prevFeature) {
				//checking if previous features are in new feature set.. if not delete the feature
				if (!(empty($_POST['features']))){
									
					if (!(in_array($prevFeature, $features))){						
						ClientFeature::where('clientID', '=', $clientID) ->where('featureID', '=', $prevFeature)->delete();
					}//endif
					
				}
				
				else{
					//delete client feature if no checkboxes checked
					ClientFeature::where('clientID', '=', $clientID) ->where('featureID', '=', $prevFeature)->delete();
					
				}//endif				
			}//end foreach
		}//endif
						
		return Redirect::action('ClientSiteController@clientProfile', array($siteName))
		->with('status','<strong>'.$siteName.'</strong> features updated successfully!');				
	
	}
	
	
	
}

