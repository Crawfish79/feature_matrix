<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ClientFeatures', function(Blueprint $table)
		{
				$table->engine = 'InnoDB';
				$table->integer('clientID')->unsigned();
				$table->integer('featureID')->unsigned();
				$table->timestamps();
				$table->primary(array('clientID', 'featureID'));
				$table->foreign('clientID')->references('clientID')->on('ClientSites')->onUpdate('cascade');			
				$table->foreign('featureID')->references('featureID')->on('Features')->onUpdate('cascade');					
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
		Schema::drop('ClientFeatures');
	}

}
