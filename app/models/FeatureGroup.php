<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class FeatureGroup extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;    


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'featureGroups';
	protected $primaryKey = 'groupID';
	protected $fillable = ['groupName'];
	protected $dates = ['deleted_at'];

}