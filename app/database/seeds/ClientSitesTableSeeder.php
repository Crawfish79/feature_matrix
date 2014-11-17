<?php

  class ClientSitesTableSeeder extends Seeder {
 
       public function run()
       {
         //delete client sites table records
         DB::table('ClientSites')->delete();		 		 
         //insert some dummy records
         DB::table('ClientSites')->insert(array(
             array('siteName'=>'jollyfarms.com','launchDate'=>'2012-06-30','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'dumptrucks.com','launchDate'=>'2001-11-13','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'bigtymeslides.com','launchDate'=>'2005-02-09','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'airballonplus.com','launchDate'=>'2004-05-05','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'doubletreefilms.com','launchDate'=>'2014-03-12','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'futuretech.edu','launchDate'=>'1999-08-03','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'gymboree.com','launchDate'=>'2004-09-10','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'cueballcourt.com','launchDate'=>'2014-03-20','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'government.org','launchDate'=>'2014-12-19','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'educateme.edu','launchDate'=>'2008-04-17','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'creekwaterfish.com','launchDate'=>'2014-08-05','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'fastfoodplace.com','launchDate'=>'2013-06-22','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'rockymtn.com','launchDate'=>'2003-11-29','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'bigbusiness.biz','launchDate'=>'2006-03-15','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'electropalace.net','launchDate'=>'2002-09-03','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'entertainu.com','launchDate'=>'2014-08-12','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'icemachine.com','launchDate'=>'2011-10-25','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'brochurepro.info','launchDate'=>'2009-04-23','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'coolkitchens.com','launchDate'=>'2005-04-16','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'bigboyplumbing.com','launchDate'=>'2009-03-21','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'kfivesoda.com','launchDate'=>'2006-06-13','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),
             array('siteName'=>'handybob.com','launchDate'=>'2014-01-09','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam'),            
             array('siteName'=>'musiccitylife.com','launchDate'=>'2010-08-23','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor mi vel interdum viverra. Aliquam')
          ));
       }
  
  }