<?php

class AppController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function getIndex() {
		return View::make('app');
	}
	public function postIndex() {
		if(Input::hasFile('file')) {
			$file = Input::file('file');
			if(strpos($file->getMimeType(), 'image') !== FALSE) {
				$type = Snapchat::MEDIA_IMAGE;
			}
			elseif(strpos($file->getMimeType(), 'video')  !== FALSE) {
				$type = Snapchat::MEDIA_VIDEO;
			}
			else {
				return Redirect::to('/')->with('error','Invalid File Type');
			}
		}
		else {
			return Redirect::to('/')->with('error','No file uploaded');
		}

		$snapchat = new Snapchat(Input::get('username'), Input::get('password')); 
		$id = $snapchat->upload(
			$type,
			file_get_contents($file->getRealPath())
			);
		$snapchat->send($id, explode(',', Input::get('usernames')), 8);

		return Redirect::to('/')->with('success','Successfully Sent');
	}

}
