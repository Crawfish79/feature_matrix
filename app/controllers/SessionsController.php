<?php

class SessionsController extends BaseController {

	public function create()
	{
		//send to home page if signed in already
		if (Auth::check()){
				
			return Redirect::to('/');
		
		}
		// show the form
		return View::make('sessions.create');
	}
	
		
	public function store()
	{
		$rules = array(
			'email'=>'required|email', 
			'password'=>'required|alphaNum|between:8,32'
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('/login')
				->withErrors($validator)
				->withInput(Input::except('password')); 
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {
				
				 return Redirect::to('/');

			} else {	 	

				return Redirect::back()->withInput()->with('message', 'Your email and/or password was incorrect.');

			}

		}
	
	}

	public function destroy()
	{
		
		Auth::logout();
		return Redirect::action('SessionsController@create');
		
	}
}