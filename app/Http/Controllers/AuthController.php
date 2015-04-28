<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Http\FormRequest;
use Input;
use App\User;
use Session;
use Hash;

class AuthController extends Controller {

	/**
	 * Display a login view.
	 *
	 * @return Response
	 */
	public function loginView()
	{
		return view('main')->with('page','login');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function login()
	{
		$validator = Validator::make(
									 [
											'email'		 	 =>  Input::get('email'),
											'password'		 =>  Input::get('password'),
								
									],		
									[
											'email' 		 => 	'required|email',
											'password' 		 => 	'required|min:6',
									]
								);
				
		
		if( $validator->fails()){
				return Redirect::back()
						->withErrors($validator)
						->withInput();
		}
		$userdata = array(
					'email'    => Input::get('email'),
					'password' => Input::get('password'));
            	
				if(Auth::attempt($userdata))
				{
						echo 'login';
				}else{
						
						Session::flash('message', 'email or password is wrong');
						
					    return redirect('/login');
					 }
		
	}

	/**
	 * Display a Registration view.
	 *
	 * @return Response
	 */
	public function registerView()
	{
		return view('main')->with('page','register');
	}

	//Registration
	public function register(){
		
		$validator = Validator::make(
									 [
											'firstname'		 =>  Input::get('firstname'),
											'lastname'		 =>  Input::get('lastname'),
											'email'		 	 =>  Input::get('email'),
											'passwd'		 =>  Input::get('passwd'),
											'confirm_passwd' =>  Input::get('confirm_passwd'),
											
									],		
									[
											'firstname'		 => 	'required|min:3',
											'lastname'		 =>		'required|min:3',
											'email' 		 => 	'required|email|unique:users',
											'passwd' 		 => 	'required|min:6',
											'confirm_passwd' => 	'required|same:passwd'
									]
								);
				
		
		if( $validator->fails()){
				return Redirect::back()
						->withErrors( $validator )
						->withInput();
		}
		$users = New User();
		$users->first_name	=	Input::get('firstname');
		$users->last_name	=	Input::get('lastname');
		$users->email		=	Input::get('email');
		$users->password	=	Input::get('passwd');
		
		if($users->save())
		{
			Session::flash('message', 'Register succesfuly');
			return Redirect::to('/');
		}
		else{
			Session::flash('message', '!Opps, Your registration fail');
			return Redirect::back();
		}
			
		
	}
}
