
<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
class User extends Eloquent implements UserInterface, RemindableInterface {
	
	use UserTrait, RemindableTrait;
	
	protected $table = 'users';
	protected $fillable = ['userName','password'];
	protected $hidden = array('password', 'remember_token');

}
// the extra space may be harmful if your enviroment is up to date and you are running a mac for this 
