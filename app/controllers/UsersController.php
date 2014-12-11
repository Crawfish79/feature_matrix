<?php

class UsersController extends BaseController {
	//returning registration view
	public function register()
	{

		return View::make('users.create');
	}	
	//create user
	public function create() 
	{
	
		$rules = array(
			'userName'=> 'required|min:5', 
			'email'=>'required|email',
		    'password'=>'required|alphaNum|between:8,32|confirmed',
		    'password_confirmation'=>'required|alphaNum|between:8,32'
		);	
	
		$validator = Validator::make(Input::all(),$rules);
	 
		if ($validator->passes()) 
		{
			try
			{	//check id auth id for user is set.. if so update
				if(isset($_POST['authID']))
				{
					$user = User::find(Input::get('authID'));
				    $user->userName = Input::get('userName');
					$user->email = Input::get('email');
				    $user->password = Hash::make(Input::get('password'));
				    $user->save();
			    	
			    	return Redirect::to('/')->with('status', '<b>User #'.$user->id.' updated</b><small> user name:'.$user->userName.' | email:'.$user->email.' | password:'.$_POST['password'].'</small>');					
				}
				//insert new user if no auth id input
				else
				{
					$user = new User;
				    $user->userName = Input::get('userName');
					$user->email = Input::get('email');
				    $user->password = Hash::make(Input::get('password'));
				    $user->save();
	
				    return Redirect::to('/')->with('status', 'New User, <b>'.$user->userName.'</b>, Registered Succesfully');
				}
			}
			
			//catch exception for duplicate entry on unique field
			catch(Illuminate\Database\QueryException $e)
			{				
				return Redirect::back()->withInput()->with('message', '<b>The username and/or email is registered..</b> must be unique.');	
			}
		
		} 
		
		else 
		{	//if heading(the edit heading) is set.. use the edit route
			if(isset($_POST['heading']))
			{
			    return Redirect::to('users/edit')->withErrors($validator)->withInput();			
			}
			//if heading not set.. use route to create a user
			else
			{
			    return Redirect::to('users/create')->withErrors($validator)->withInput();
			}
		}
	}

	//creat a simple list of all users
	public function userList()
	{
		
		$users = User::orderBy('userName')->get();
		
		return View::make('users.list')->with('users',$users);
	}
	
	//manipulating the create users view with a heading for edit
	public function userProfileEdit()
	{
		
		$heading = "Edit User Profile<small> ".Auth::user()->userName." | ID:".Auth::user()->id."</small>";
		
		return View::make('users.create')->with('heading',$heading);
		
	}
}	
