<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		Eloquent::unguard();
		$this->call('UsersTableSeeder');		
		$this->call('ClientSitesTableSeeder');
		$this->call('FeatureGroupsTableSeeder');
		$this->call('FeaturesTableSeeder');
		$this->call('ClientFeaturesTableSeeder');		
        //this message shown in your terminal after running db:seed command
        $this->command->info(" tables seeded :)");		
	}

}
