<?php

class FeatureGroupController extends BaseController {
	
	public function featureGroupCreate()
	{

		$groupName = Input::get('groupName');			 
		$newGroup = FeatureGroup::create(array('groupName' => $groupName));
		$groupID = $newGroup->groupID;
		
		return View::make('edit.featureGroupFeatureAdd')
		->with('groupName',$groupName)
		->with('groupID',$groupID);	
	}
	
	
	public function featureGroupProfile($groupName)
	{
		$group = FeatureGroup::whereGroupname($groupName)->first();			
		$groupID = $group['groupID'];
		$featuresOfGroup = DB::table('features')->where('groupID','=', $groupID )->get();
		if(Session::has('status'))
		{
		return View::make('profiles.featureGroupProfile')		
		->with('groupName',$groupName)
		->with('groupID',$groupID)
		->with('featuresOfGroup',$featuresOfGroup)
		->with('status',Session::get('status'));
		}
		else
		{						
		return View::make('profiles.featureGroupProfile')		
		->with('groupName',$groupName)
		->with('groupID',$groupID)
		->with('featuresOfGroup',$featuresOfGroup);			
		}
				
	}

}

