<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('FeatureGroups', function(Blueprint $table)
		{
				$table->engine = 'InnoDB';
				$table->increments('groupID');
				$table->string('groupName')->unique();
				$table->timestamps();
				$table->softDeletes();
				//
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('FeatureGroups');
	}

}
