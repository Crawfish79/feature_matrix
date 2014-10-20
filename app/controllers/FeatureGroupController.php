<?php

class FeatureGroupController extends BaseController {
	
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

	public function featureGroupCreate()
	{

		$groupName = Input::get('groupName');
		
		try
		{		 
			$newGroup = FeatureGroup::create(array('groupName' => $groupName));
			
			$groupID = $newGroup->groupID;
			
			return View::make('edit.featureGroupFeatureAdd')
			->with('groupName',$groupName)
			->with('groupID',$groupID);	
		}
		
		catch(\Illuminate\Database\QueryException $e)
		{			
			return Redirect::action('ClientSiteController@showClients')
		    ->with('status','<strong>'.$groupName.' group already exist!</strong>');			
		}
	}
	
	public function featureGroupDelete()
	{
		$groupName = Input::get('groupName');	
		$groupID = Input::get('groupID');
		
		try
		{		 
			$featureGroupDelete = DB::table('featureGroups')->where('groupID','=',$groupID)->delete();
		
			return Redirect::action('ClientSiteController@showClients')
		    ->with('status','<strong>'.$groupName.' group has been removed successfully!</strong>');				
		}

		catch (\Illuminate\Database\QueryException $e) 
		{
			return Redirect::back()
			->withInput()	
			->with('status','<strong>'.$groupName.' group has dependencies!..</strong> associated features must be removed first.');
		}
	}
}

