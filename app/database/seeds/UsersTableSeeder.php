<?php

  class UsersTableSeeder extends Seeder {
 
       public function run()
       {
       	//delete users table records
	 	DB::table('Users')->delete();
		//create users
		User::create(array(
			'userName' => 'dynamix',
			'password' => Hash::make('abcd1234')
		));
		      	
       }
  }