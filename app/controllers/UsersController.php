<?php

class UsersController extends BaseController {

	public function register()
	{

		return View::make('users.create');
	}	
	
	public function create() {
	
		$rules = array(
			'userName'=> 'required|min:5', 
			'email'=>'required|email',
		    'password'=>'required|alphaNum|between:8,32|confirmed',
		    'password_confirmation'=>'required|alphaNum|between:8,32'
		);	
	
		$validator = Validator::make(Input::all(),$rules);
	 
		if ($validator->passes()) {
			try
			{
				$user = new User;
			    $user->userName = Input::get('userName');
				$user->email = Input::get('email');
			    $user->password = Hash::make(Input::get('password'));
			    $user->save();
			 
			    return Redirect::to('/')->with('status', 'New User, <b>'.$user->userName.'</b>, Registered Succesfully');
			}
		
			catch(Illuminate\Database\QueryException $e)
			{				
				return Redirect::back()->withInput()->with('message', 'The username, email, and password must be unique.');	
			}
		
		} 
		else {
		    return Redirect::to('users/create')->withErrors($validator)->withInput();
		}
	}
}	
