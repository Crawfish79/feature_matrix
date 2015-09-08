<?php

  class FeaturesTableSeeder extends Seeder {
 
       public function run()
       {
       	 //delete features table records
		 DB::table('Features')->delete();	 
         //insert some dummy records
         DB::table('Features')->insert(array(
             array('groupID'=> 1,'featureName'=>'tiny form','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 1,'featureName'=>'search form','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 1,'featureName'=>'mega form','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 1,'featureName'=>'signup form','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 1,'featureName'=>'contact form','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 2,'featureName'=>'clock widget','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 2,'featureName'=>'weather widget','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 2,'featureName'=>'toolbar widget','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 2,'featureName'=>'facebook widget','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 2,'featureName'=>'dropbox widget','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 3,'featureName'=>'robot gadget','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 3,'featureName'=>'jumpman gadget','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 3,'featureName'=>'shield gadget','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 3,'featureName'=>'shiny gadget','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 3,'featureName'=>'inspector gadget','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 4,'featureName'=>'u.s. map','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 4,'featureName'=>'world map','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 4,'featureName'=>'big map','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 4,'featureName'=>'universe map','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 5,'featureName'=>'dig tool','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 5,'featureName'=>'hammer tool','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 5,'featureName'=>'divider tool','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 5,'featureName'=>'wonderful tool','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos'),
             array('groupID'=> 5,'featureName'=>'shrinker tool','featureNote'=>'At vero eos et accusamus et iusto odio dignissimos')            
          ));
       }
  
  }