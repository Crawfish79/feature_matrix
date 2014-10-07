<?php

class FeatureController extends BaseController {
	
	//deleting a feature based on id
	public function featureDelete()
	{

		$featureID = $_POST['featureID'];
		$featureDelete = DB::table('features')->where('featureID','=',$featureID)->delete();
		return View::make('profiles.featureGroupProfile')->with('featureID',$featureID);
		
	}

	//creating a feature for a specific group
	public function featureCreate()
	{
		$groupName = Input::get('groupName');	
		$groupID = Input::get('groupID');
				
		if(!empty($_POST['featureName']))
		{
			$featureName = $_POST['featureName'];
			$featureAdd = DB::table('features')->insertGetId(array('groupID' => $groupID, 'featureName' => $featureName));
			return View::make('edit.featureGroupFeatureAdd');
		}
		
		else
		{
			return View::make('edit.featureGroupFeatureAdd')->with('groupName',$groupName)->with('groupID',$groupID);
		}
	}

}
