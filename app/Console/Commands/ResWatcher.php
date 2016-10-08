<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Filesystem\Filesystem;
use JasonLewis\ResourceWatcher\Tracker;
use JasonLewis\ResourceWatcher\Watcher;

use App\Project;
use App\Images;
use App\Fields;

use App\Ocr\OcrMaker;


class ResWatcher extends Command
{
  protected $signature = 'rw';
  protected $description = 'Command description';

  public function __construct(Project $project,
                              Images $images,
                              Fields $data_field)
  {
    parent::__construct();
    $this->project = $project;
    $this->images = $images;
    $this->data_field = $data_field;

    $this->files = new Filesystem();
    $this->tracker = new Tracker();
    $this->ocr = new OcrMaker();
    $this->ocr->engine('tesseract');

    $this->wcreate = function( $resource, $fullpath ){
      if (!in_array(@exif_imagetype($fullpath),[2,3]));
      $name_file = basename($fullpath);
      $path = basename(dirname(dirname($fullpath)));
      $id_proj = $this->project
        ->where('path', $path)
        ->pluck('id');

      $input_path = dirname($fullpath);
      $output_path = dirname(dirname($fullpath)).'\output';
      $form_path = dirname(dirname($fullpath))."\\test_tmpl.form.txt";

      echo "New file:".$name_file."\n";
      echo "Full path:$fullpath\n";
      echo "Project directory: $path \n";
      echo "Project id: $id_proj \n";
      echo "INPUT: $input_path\n";
      echo "OUTPUT: $output_path\n";
      echo "FORM: $form_path\n";
      $id_image = $this->images
        ->insertGetId(array(
          'id_project' => $id_proj,
          'name' => $name_file
        ));

      $this->ocr
        ->input($input_path)
        ->output($output_path)
        ->form($form_path)
        ->make(array($name_file));

      foreach( glob( $output_path. '\\'. $name_file. '\\*.png.txt' ) as $field_value ) {
        $this->data_field
          ->insert(array(
            'id_project' => $id_proj,
            'id_image'=> $id_image,
            'value' => file_get_contents($field_value),
            'name' => basename($field_value, '.png.txt')
          ));
      }

      echo "==================================\n";
    };
  }

  public function handle()
  {
    $list_proj = $this->project->select('id', 'path')->get();

    $watcher = new Watcher($this->tracker, $this->files);

    foreach($list_proj as $proj) {
      $fullpath = storage_path('app\ocr_project\\'.$proj->path.'\\input');
      //echo "$fullpath\n";
      $watcher
        ->watch($fullpath)
        ->create($this->wcreate);
    }

    echo "<------------------>\n";
    $watcher->start();
}

}
