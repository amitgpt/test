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


Route::group((['prefix' => '']), function (){
	
	Route::get('/', 'AuthController@loginView');
		
	Route::get('register','AuthController@registerView');

});

Route::group((['prefix' => 'auth']), function (){
	
	Route::post('login', 'AuthController@loginView');
		
	Route::post('register','AuthController@register');

});

Route::get('logout',function(){
	
	
});
	
   

