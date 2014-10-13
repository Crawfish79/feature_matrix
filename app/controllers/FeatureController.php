<?php

class FeatureController extends BaseController {
	
	//deleting a feature based on id
	public function featureDelete()
	{
		$groupName = Input::get('groupName');	
		$groupID = Input::get('groupID');		
		$featureID = Input::get('featureID');
		
		$featureDelete = DB::table('features')->where('featureID','=',$featureID)->delete();
		
		return Redirect::action('FeatureGroupController@featureGroupProfile', array($groupName))
		->with('status',$groupName.' feature deleted successfully!');
	}

	//creating a feature for a specific group
	public function featureCreate()
	{
		$groupName = Input::get('groupName');	
		$groupID = Input::get('groupID');
				
		if(isset($_POST['createFeat']))
		{
			$featureName = Input::get('featureName');
			
		    $validator = Validator::make(['featureName' => $featureName],['featureName' => 'required|min:3']);
			if ($validator->fails())
			{
			    return View::make('edit.featureGroupFeatureAdd')
			    ->with('groupName',$groupName)
			    ->with('groupID',$groupID)
			    ->withErrors($validator);
			}
			else
			{
				
				$featureAdd = DB::table('features')
				->insertGetId(array('groupID' => $groupID, 'featureName' => $featureName));
				
				return Redirect::action('FeatureGroupController@featureGroupProfile', array($groupName))
			    ->with('status',$groupName.' feature created successfully!');
		    }
		}
		
		else
		{
			return View::make('edit.featureGroupFeatureAdd')
			->with('groupName',$groupName)
			->with('groupID',$groupID);
		}
	}

}
