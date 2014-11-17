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
			$featureNote = Input::get('featureNote');
			
		    $validator = Validator::make(['featureName' => $featureName,'featureNote' => $featureNote],
		    							 ['featureName' => 'required|min:3','featureNote' => 'required']);
			
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
					->insertGetId(array('groupID' => $groupID, 'featureName' => $featureName,'featureNote' => $featureNote));
					
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

		$clientFeatures = ClientFeature::where('featureID','=',$featureID)->count();
		
		if ($clientFeatures > 0)
		{
			return Redirect::back()
			->withInput()	
			->with('status','<strong>This '.$groupName.' feature has dependencies!..</strong> associated client features must be removed first');		
		}
		
		else 
		{
			$featureDelete = Feature::where('featureID','=',$featureID)->delete();			
			
			return Redirect::action('FeatureGroupController@featureGroupProfile', array($groupName))
			->with('status','<strong>'.$groupName.' feature deleted successfully!</strong>');
		}
	}
	//search for a feature.. returns clients and feature notes for clients
	public function featureSearch()
	{
		$searchTerm = Input::get('searchTerm');

		$validator = Validator::make(['searchTerm' => $searchTerm],['searchTerm' => 'required']);
			
		if ($validator->fails())
		{
			return Redirect::to('/');
		}
		
		else
		{	//copy features table into a temporary table for fulltext search
			$featuresTemp = DB::insert(DB::raw( 
												'CREATE TEMPORARY TABLE featuresTemp
									 			(PRIMARY KEY (featureID), FULLTEXT (featureName))ENGINE=MyISAM 
									 			AS(SELECT * FROM features)')
											   );
			//												
			$results = DB::table('clientFeatures')
			->join('clientSites', 'clientSites.clientID', '=', 'clientFeatures.clientID')
	        ->join('featuresTemp', 'featuresTemp.featureID', '=', 'clientFeatures.featureID')
	        ->select('featuresTemp.featureName', 'clientSites.siteName', 'clientFeatures.clientFeatureNote')
			
			->whereRaw( 
						"MATCH(featuresTemp.featureName) AGAINST(concat('+',?,'*') IN BOOLEAN MODE)",  
						array($searchTerm)
					  )		
					  	
			->where('featuresTemp.deleted_at', '=', NULL);
			
			$resultsCount = $results->count();
			$results = $results->paginate(10);	
				            	
			return View::make('profiles.featureSearch')
			->with('results',$results)
			->with('resultsCount',$resultsCount)
			->with('searchTerm',$searchTerm);
		}


	}
}
