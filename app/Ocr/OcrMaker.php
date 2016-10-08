<?php
namespace App\Ocr;

function br() {echo "\n";}

include_once 'fsTools.php';

use App\Ocr;
use Exception;

class OcrMaker {
	protected $input;
	protected $output;
	protected $engine;
	protected $form;	

	protected $forever = false;

	public $fs;
    function __construct($arg = null) {
		$this->fs = new fsTools();
	}

	public function decode_form($path) {		
		$file = file_get_contents($path);
		$this->form = json_decode($file);		
		// Проверка правильности json	#Erorr_log
	}

	public function input($path) {
		//if (!is_dir($this->input) || !is_file($this->input) ) 
		if (!is_dir($path))
			throw new Exception("INPUT isn't a file or a directory!\n");
		$this->input = $path;
		return $this;
	}

	public function output($path) {
		if (!is_dir($path)) 
			throw new Exception("OUTPUT not found!\n");
		$this->output = $path;
		return $this;
	}

	public function form($path) {
		if (!is_file($path)) 
			throw new Exception("File of FORM not found!\n");
		//$this->form = $this->decode_form($path);
		$file = file_get_contents($path);
		$this->form = json_decode($file);
		//!!! Проверка на ERORR JSON
		//var_dump($path);
		//var_dump($this->form);

		return $this;
	}

	public function engine($path) {
/*
		if (!is_file($path))
			throw new Exception("ENGINE not found!\n");
*/
		$this->engine = $path;
		return $this;
	}

	public $ocr = array();
	public function ocr() {
		if (empty($this->ocr)) return;
		
		foreach ($this->ocr as $_dir) {
			foreach (glob($_dir.'/*') as $img) {
				echo $img."\n";
				$cmd = $this->engine. ' -l rus -psm 8 '.
				$img . ' ' . $img;
				echo "\$cmd = $cmd\n";
				exec($cmd);
			}
			echo "----\n";
		}
	}

	public $overlay = array();
	public function overlay() {
		if (empty($this->form))
			throw Exception('FORM is not defined!');
		$areas = $this->form->areas;
		while (!empty($this->overlay)) {
			//$img = array_pop($this->overlay);
			$img = array_shift($this->overlay);
			
			print_r( $img );
			$wk_dir = $this->output .'/'. basename( $img[0]);
      if (is_dir($wk_dir)) $this->fs->delete($wk_dir);
			mkdir( $wk_dir );
			$kx = imagesx($img[1])/$this->form->dx;
			$ky = imagesy($img[1])/$this->form->dy;
			echo "\n \$kx=$kx \$ky=$ky \n";
			for($i=0; $i<count($areas); $i++)	{
				$dx = floor($areas[$i]->dx*$kx);
				$dy = floor($areas[$i]->dy*$ky);
				$x = floor($areas[$i]->x*$kx);
				$y = floor($areas[$i]->y*$ky);
				$name = $areas[$i]->name;
				echo $areas[$i]->name."\n";
				echo "\n \$dx=$dx \$dy=$dy \n";
				echo "\n \$x=$x \$y=$y \n";
				$rc_crop_img = imagecreate($dx, $dy);					
				imagecopy($rc_crop_img, $img[1], 0, 0,
					$x, $y, $dx, $dy );
				imagepng($rc_crop_img, $wk_dir . '/'. $name .'.png');
			}
			array_push($this->ocr, $wk_dir);
		}
	}	

	public function make( $target=null ) {
    echo "make!\n";
    echo (is_array($target))? "array\n": "not array\n";

		if (!$target) {
			foreach (glob($this->input.'/*') as $file) {
				$rc_img=$this->get_rc_image($file);
				if ($rc_img)
					array_push($this->overlay, array($file, $rc_img));
			}
			$this->overlay();
			$this->ocr();
			return $this;
		}

		if (is_array($target)) {
			foreach ($target as $file) {
				if (!is_file($file)) $_file = $this->input .'\\'.$file;
        echo "<>$_file\n";
				$rc_img=$this->get_rc_image($_file);
        echo "$rc_img\n";
				if ($rc_img)
					array_push($this->overlay, array($file, $rc_img));
			}

			$this->overlay();
			$this->ocr();
			return $this;

		}
	}

	public function get_rc_image($path) {
		switch (exif_imagetype($path)) {
			case 2: return imagecreatefromjpeg( $path );
			case 3: return imagecreatefrompng( $path );
		}
		return null;
	}

	public function clear($file) {
		if (is_file($file)) $file = basename($file);
		$this->fs->delete($this->output.'/'.$file);		
	}

	public function clearAll() {
		$this->fs->clear($this->output);
		return $this;
	}
	public function start() {}
	public function stop() {}
	public function restart() {}

}
/*
$ocr = new OcrMaker();

$ocr
	->input(__DIR__.'/input')
	->output(__DIR__.'/output')
	->engine('tesseract')
	->form(__DIR__.'/test_tmpl.form.txt')
	->clearAll()
	->make(array('1.jpg'));

	sleep(5);
$ocr->clear('1.jpg');
*/