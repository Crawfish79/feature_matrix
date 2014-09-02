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
		
				$table->integer('clientID');
				$table->integer('featureID');
				$table->timestamps();
				$table->primary(array('clientID', 'featureID'));
				$table->foreign('clientID')->references('clientID')->on('ClientSites')->onUpdate('cascade')->onDelete('cascade');			
				$table->foreign('featureID')->references('featureID')->on('Features')->onUpdate('cascade')->onDelete('cascade');					
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
