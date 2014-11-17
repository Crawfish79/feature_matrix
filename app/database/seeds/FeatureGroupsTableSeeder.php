<?php

  class FeatureGroupsTableSeeder extends Seeder {
 
       public function run()
       {
       	 //delete feature groups table records
		 DB::table('FeatureGroups')->delete();	
         //insert some dummy records
         DB::table('FeatureGroups')->insert(array(
             array('groupName'=>'forms'),
             array('groupName'=>'widgets'),
             array('groupName'=>'gadgets'),
             array('groupName'=>'maps'),
             array('groupName'=>'tools')
          ));
       }
  
  }