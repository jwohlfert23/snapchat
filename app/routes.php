<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('app');
});
Route::post('/',function() {
	$file = Input::file('file');
	if(strpos($file->getMimeType(), 'image')) {
		$type = Snapchat::MEDIA_IMAGE;
	}
	elseif(strpos($file->getMimeType(), 'video')) {
		$type = Snapchat::MEDIA_VIDEO;
	}
	else {
		return Redirect::to('/');
	}
	$snapchat = new Snapchat(Input::get('username'), Input::get('password')); 
	$id = $snapchat->upload(
		$type,
		file_get_contents($file->getRealPath())
		);
	$snapchat->send($id, explode(',', Input::get('usernames')), 8);
});