<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DataField;

class DataFieldController extends Controller
{
  public function __construct(DataField $data_field) {
    $this->data_filed = $data_field;
  }

  public function getIndex($id_proj=null) {
    if (!$id_proj) return redirect('project');
    return "Index \$id_proj=$id_proj";
  }

  public function getData($id_proj = null)
  {
    $id_images = $this->data_filed
                      ->select('id_image')
                      ->where('id_proj', $id_proj)
                      ->distinct()
                      ->get();

//    $fields = $this->data_filed
//                   ->select('name_field')
//                   ->distinct()
//                   ->get();

    $table_field = array();
    foreach($id_images as $key => $val){
      $line_field = array();
      foreach($this->data_filed
                ->select('value')
                ->where('id_image', $val->id_image)
                ->get() as $value)
      {
        array_push($line_field, $value->value);
      };
      array_push($table_field, $line_field);
    }

    return $table_field;
  }
}
