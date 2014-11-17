<?php

class UsersController extends BaseController {

	public function register()
	{

		return View::make('users.create');
	}	
	
	public function create() {
	
		$rules = array(
			'userName'=> 'required|min:5', 
		    'password'=>'required|alphaNum|between:6,12|confirmed',
		    'password_confirmation'=>'required|alphaNum|between:6,12'
		);	
	
		$validator = Validator::make(Input::all(),$rules);
	 
		if ($validator->passes()) {
		    $user = new User;
		    $user->userName = Input::get('userName');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
		 
		    return Redirect::to('/')->with('status', 'New User, <b>'.$user->userName.'</b>, Registered Succesfully');
		} else {
		    return Redirect::to('users/create')->withErrors($validator)->withInput();
		}
	}
}	
