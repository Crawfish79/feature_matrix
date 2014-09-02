<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Features', function(Blueprint $table)
		{
			
				$table->increments('featureID');
				$table->integer('groupID');
				$table->string('featureName');
				$table->timestamps();
				$table->foreign('groupID')->references('groupID')->on('FeatureGroups')->onUpdate('cascade')->onDelete('cascade');			
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
		Schema::drop('Features');
	}

}
