<?php

namespace GL;

class Text extends Widget {
	private $_text;
	
	public function __construct($widget) {
	    parent::__construct($widget);
		$this->_text = $widget['text'];
	}
	
	public function draw() {
		echo "<div class='widget col-md-{$this->width} well' style='border: 1px solid;'>";
		echo $this->_text;
		echo "</div>";
	}
}