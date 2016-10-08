<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectsController extends Controller
{
    public function __construct(Project $project)   {
      $this->project = $project;
    }

    public function getIndex(){
      return view('projects', [
      		'projects' => $this->project->all()
      		]);
    }
}
