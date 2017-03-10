<?php

namespace GL;

class Image extends Widget {
	private $_src;
	
	public function __construct($widget = array()) {
		$this->_src = $widget['src'];
	}
	
	public function draw() {
		echo "<div class='widget col-md-{$this->width} col-md-offset-{$this->offset} well' style='border: 1px solid;min-height: ".(60*$this->height)."px;'>";
		echo "<img src='{$this->_src}'>";
		echo "</div>";
	}
}