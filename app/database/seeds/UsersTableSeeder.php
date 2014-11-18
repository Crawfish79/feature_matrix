<?php

  class UsersTableSeeder extends Seeder {
 
       public function run()
       {
       	//delete users table records
	 	DB::table('Users')->delete();
		//create users
		User::create(array(
			'userName' => 'dynamix',
			'email' => 'rocraw79@hotmail.com',
			'password' => Hash::make('abcd1234')
		));
		      	
       }
  }