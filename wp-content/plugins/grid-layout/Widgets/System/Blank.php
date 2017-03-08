<?php

namespace GL;

class Blank extends Widget {
	
	private $_empty = FALSE;
	
	public function __construct() {}
	
	public function setEmpty() {
		$this->_empty = TRUE;
	}

	public function draw() {
		if($this->_empty) {
			return;
		}
		
		echo "<div class='widget col-md-{$this->width} well' style='border: 1px solid orange;'>";
		echo "&nbsp;";
		echo "</div>";
	}
}