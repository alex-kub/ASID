<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\Images;
use App\Fields;

use Request;
use Input;
use Storage;
use Log;

class ImagesController extends Controller
{
	public function __construct(
                        Project $project,
												Images $images,
                        Fields $fields
												)
	{
    $this->project = $project;
    $this->images = $images;
    $this->fields = $fields;
	}

	public function getPage($id_project=null) {
		if ( !$id_project)	return redirect('projects');

		return view('images', [
    'id_project' => $id_project,
		'name_project' =>	$this->project->find($id_project)->name
    ]);
	}

  public function postData($id_project) {

/*
  return json_encode(
    $this
    ->images
    ->select('id', 'checked', 'name_file', 'recog', 'verif', 'update_at')
    ->where('id_proj', $id_proj)
    ->get()
  );
*/
  $output = $this
    ->images
    ->select('id', 'name')
    ->where('id_project', $id_project)
    ->get();

  foreach($output as $key => $value) {
    $output[$key]->recog = $this
      ->fields
      ->where('id_image', $value->id)
      ->count();
    $output[$key]->verif = $this
      ->fields
      ->where('id_image', $value->id)
      ->where('verif','!=', 'NULL')
      ->count();
/*
    $log = $output[$key]->verif;
    Storage::append('file.log', $output[$key]);
    $output[$key]
*/
  }
/*
Storage::append('file.log', $output);
Storage::append('file.log', '<---->');
*/
  return $output;
  }

  public function putData($id_proj = null, $id_image = null) {
//$input = Request::input('checked');
//  Storage::append('file.log', "\$id_proj=$id_proj \n");
//  Storage::append('file.log', $input['id']);
//  Storage::append('file.log', $input['checked']);
//  Storage::append('file.log', "checked=".Request::input('checked'));
  $this->images->where('id', Request::input('id'))->update(array(
    'checked' => Request::input('checked')
  ));
  }


}