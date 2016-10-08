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


Route::get('', function() {
	return redirect('projects');
});

Route::controller('projects', 'ProjectsController');
Route::controller('images', 'ImagesController');
/*
Route::controller('data_field/{id_proj?}/{id_image?}', 'DataFieldController');





Route::controller('fs', 'FileSystem');

Route::controller('test', 'TestController');

Route::get('layout', function() {
	return view('layout');
});

Route::get('ws_test', function() {
  return view('ws_test');
});
*/