<?php

  class UsersTableSeeder extends Seeder {
 
       public function run()
       {
       	//delete users table records
	 	DB::table('Users')->delete();
		//create users
		User::create(array(
			'userName' => 'dynamix_Admin',
			'email' => 'rocraw79@gmail.com',
			'password' => Hash::make('abcd1234')
		));
		      	
       }
  }