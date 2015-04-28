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
use Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\Response;
use Guzzle\Http\EntityBody;

   

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
				{	$getGitName = User::find(Auth::id());
					$gitname = $getGitName->git_name;
					if($gitname)
					{
						 return redirect('index');
					}
					else{
						return redirect('setting');
					}
						//return redirect('index');
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
	
	
	public function index(){
			return view('main')->with('page','index');
		
	}
	
	public function settingView(){
			return view('main')->with('page','setting');
	}
	
	public function setting(){
		
			$gitName = Input::get('gitname'); 
			
			
			$client = new Client('https://api.github.com');
			// $request = $client->post('authorizations', array($gitName)); 
				$response = $request->send();
			$body = json_decode($response->getBody(true));
			
			
			
			
			
			// $request = $client->createRequest('GET', 'https://api.github.com/users/'.$gitName);
			// $response = $client->send($request);
			 
		//	 $response = $client->get('GET', 'https://api.github.com/users/'.$gitName);
			 
			 
			 
			 
			 
			 
			 
			 
			//$client = new Client();
			//$request = $client->get('GET','https://api.github.com/users/'.$gitName);
			//echo $request->getUrl();
			//die;
			//$request = $client->createRequest('GET', 'https://api.github.com/users/'.$gitName);
			
			//$response = $client->send($request);
			//$response = $client->get('GET', 'https://api.github.com/users/'.$gitName);
			//$json = $response->json();
			//echo'<pre>';
			//print_r($json);
			//die;

			/*try {
				 $client->createRequest('GET', 'https://api.github.com/users/'.$gitName);
			} catch (RequestException $e) {
				echo $e->getRequest() . "\n";
				if ($e->hasResponse()) {
					echo $e->getResponse() . "\n";
				}
			}
			*/
			
			
			
			
			
			
			
			/*$client = new Client();
			//$request = $client->createRequest('GET', 'https://api.github.com/users/'.$gitName);
			
			//$response = $client->send($request);
			$response = $client->get('GET', 'https://api.github.com/users/'.$gitName);
			$json = $response->json();
			echo'<pre>';
			print_r($json);
			die;
			
			*/
			 /* $client = new Client();
				$res = $client->get('https://api.github.com/users/amitgpt');
				echo $res->getStatusCode();
				// "200"
				echo $res->getHeader('content-type');
				// 'application/json; charset=utf8'
				echo $res->getBody();
				// {"type":"User"...'
				var_export($res->json());
			*/
			
	}
	
}
