<?php

class FeatureGroupController extends BaseController {
	
	public function featureGroupProfile($groupName)
	{
		$group = FeatureGroup::whereGroupname($groupName)->first();			
		$groupID = $group['groupID'];
		$featuresOfGroup = DB::table('features')->where('groupID','=', $groupID )->get();
		return View::make('profiles.featureGroupProfile')->with('groupName',$groupName)
														 ->with('groupID',$groupID)
														 ->with('featuresOfGroup',$featuresOfGroup);
				
	}
	
}

