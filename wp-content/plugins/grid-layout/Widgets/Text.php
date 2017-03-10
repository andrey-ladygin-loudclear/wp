<?php

namespace GL;

class Text extends Widget {
	private $_text;
	
	public function __construct($widget = array()) {
		$this->_text = $widget['text'];
	}
	
	public function draw() {
		echo "<div class='widget col-md-{$this->width} col-md-offset-{$this->offset} well' style='border: 1px solid;min-height: ".(60*$this->height)."px;'>";
		echo $this->_text;
		echo "</div>";
	}
}