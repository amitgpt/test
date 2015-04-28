<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

//Route::get('home', 'HomeController@index');

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

*/
Route::get('test',function(){
	
		//$getUrl = "https://api.github.com/users/amitgpt";
		//print_r(file_get_contents($getUrl));
		return view('main')->with('page','setting');
		
	
});

Route::group((['prefix' => '']), function (){
	
	Route::get('/', 'AuthController@loginView');
		
	Route::get('register','AuthController@registerView');

});



Route::group((['prefix' => 'auth']), function (){
	
	Route::post('login', 'AuthController@login');
		
	Route::post('register','AuthController@register');

});

Route::get('index','AuthController@index');
Route::get('setting','AuthController@settingView');
Route::post('setting','AuthController@setting');

Route::get('logout',function(){
	
	Auth::logout();
	return Redirect('/');
	});

	
   

