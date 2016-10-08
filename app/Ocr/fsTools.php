<?php

namespace App\Ocr;
use Exception;
use Closure;

class fsTools {
	public function clear($path=null) {
		if (!$path) return $this;
		if (!is_dir($path)) $this;
		foreach (glob($path.'/*') as $item) {
			 is_file( $item ) ? unlink($item) : $this->delete($item);
		}
		return $this;
	}
	public function delete($path=null) {
		if (!$path) return;
		if (is_file($path)) {
			unlink($path);			
			return $this;
		}
		if ($list = glob($path.'/*')) {				
			foreach ($list as $item) {
				is_dir($item) ? $this->delete($item) : unlink($item);
			}
		}
		rmdir($path);
		return $this;
	}

	public function spy($path, Closure $callback, $step=1000000) {		
		$list = array();
		do {
			$saved_list = $list;
			$list = glob($path.'/*');

			foreach ( array_diff($list, $saved_list) as $item) {
				$callback($item);
			}
			usleep($step);
			
		} while (true);
		return $this;
	}
	public function test(){
		echo "test 'fsTools'";
	}
}
/*
$fs = new fsTools();

$fs->spy(__DIR__.'/output', function($arg)	{
	echo $arg."\n";
});
*/




