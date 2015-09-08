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
				$table->engine = 'InnoDB';
				$table->increments('featureID');
				$table->integer('groupID')->unsigned();
				$table->string('featureName')->unique();
				$table->Text('featureNote');
				$table->timestamps();
				$table->softDeletes();
				$table->foreign('groupID')->references('groupID')->on('FeatureGroups')->onUpdate('cascade');			
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
