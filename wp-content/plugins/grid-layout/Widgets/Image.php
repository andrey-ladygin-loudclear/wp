<?php

namespace GL;

class Image extends Widget {
	private $_src;
	
	public function __construct($widget) {
	    parent::__construct($widget);
		$this->_src = $widget['src'];
	}
	
	public function draw() {
		echo "<div class='widget col-md-{$this->width} well' style='border: 1px solid;'>";
		echo "<img src='{$this->_src}'>";
		echo "</div>";
	}
}