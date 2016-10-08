<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Storage;


class FileSystem extends Controller
{
	public function getIndex() {

		return view('fs',[
			'dir' => Storage::disk('local')
								->directories('', false)
			]);
	}
}