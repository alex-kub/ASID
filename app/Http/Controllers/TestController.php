<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class TestController extends Controller
{
// http://laravel.com/docs/5.1/controllers#dependency-injection-and-controllers
  public function __construct() {}

  public function getPage($id=null)  {
    if (!$id) return redirect('project');
    return "getPAGE \$id=$id";
  }

  public  function getData($id=null) {
    if (!$id) return redirect('project');
    return "getDATA: \$id=$id";
  }
}
