<?php

class FeatureGroupController extends BaseController {
	
	public function featureGroupProfile($groupName)
	{
		$group = FeatureGroup::whereGroupname($groupName)->first();			
		$groupID = $group['groupID'];
		$featuresOfGroup = Feature::where('groupID','=', $groupID )->orderBy('featureName')->get();
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
		
		$validator = Validator::make(['groupName' => $groupName],
									 ['groupName' => 'required|unique:featureGroups|Between:3,14']);

        if ($validator->fails())
        {
			 return Redirect::action('ClientSiteController@showClients')
		     ->with('danger','<b>group name is invalid!..</b>format:unique|min:3/max:14 characters');       	
        }
        
        else
        {
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
			    ->with('danger','<strong>'.$groupName.' group already exist!</strong>');			
			}	
		}
	}
	public function featureGroupDelete()
	{
		$groupName = Input::get('groupName');	
		$groupID = Input::get('groupID');
		
		$features = Feature::where('groupID','=',$groupID)->count();
		if ($features > 0)
		{
			return Redirect::back()
			->withInput()	
			->with('danger','<strong>'.$groupName.' group has dependencies!..</strong> associated features must be removed first.');
		}

		else
		{		 
			$featureGroupDelete = FeatureGroup::where('groupID','=',$groupID)->delete();
		
			return Redirect::action('ClientSiteController@showClients')
		    ->with('status','<strong>'.$groupName.' group has been removed successfully!</strong>');				
		}

	}
}

