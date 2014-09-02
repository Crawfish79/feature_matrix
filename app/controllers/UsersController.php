<?php

class UsersController extends \BaseController {

	public function index()
	{
	$users = User::all();
	
	return View::make('users.index', ['users' => $users]);
	
	}
	public function show($username)
	
{
	$user = User::whereUsername($username)->first();
	
	return View::make('users.show', ['user' => $user]);
	}
	
	public function create()
	{
	return View::make('users.create');
	}
	
	public function store()
	{
	if (! User::isValid(Input::all()))
	
	{
	      return Redirect::back()->withInput()->withErrors(User::$errors);
	  }
	 
	 $user = new User;
	 $user->username = Input::get('username');
	 $user->password = Hash::make(Input::get('password'));
	 $user->save();
	 
	 return Redirect::to('/users');
}
}