<?php

class FeatureController extends BaseController {
	
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
				try
				{				
					$featureCreate = DB::table('features')
					->insertGetId(array('groupID' => $groupID, 'featureName' => $featureName));
					
					return Redirect::action('FeatureGroupController@featureGroupProfile', array($groupName))
				    ->with('status','<strong>'.$featureName.'</strong> created successfully!');
				}
				
				catch(\Illuminate\Database\QueryException $e)
				{
					Session::flash('status','<strong>'.$featureName. '</strong> already exist for this group!');										
				    return View::make('edit.featureGroupFeatureAdd')
				    ->with('groupName',$groupName)
				    ->with('groupID',$groupID);
				}
		    }
		}
		
		else
		{
			return View::make('edit.featureGroupFeatureAdd')
			->with('groupName',$groupName)
			->with('groupID',$groupID);
		}
	}	
	
	//deleting a feature based on id
	public function featureDelete()
	{
		$groupName = Input::get('groupName');	
		$groupID = Input::get('groupID');		
		$featureID = Input::get('featureID');
		$featureName = Input::get('featureName');

		try
		{
		$featureDelete = DB::table('features')->where('featureID','=',$featureID)->delete();
		
			return Redirect::action('FeatureGroupController@featureGroupProfile', array($groupName))
			->with('status','<strong>'.$groupName.' feature deleted successfully!</strong>');
		}
		
		catch (\Illuminate\Database\QueryException $e) 
		{
			return Redirect::back()
			->withInput()	
			->with('status','<strong>This '.$groupName.' feature has dependencies!..</strong> associated client features must be removed first');
		}
	}

}
