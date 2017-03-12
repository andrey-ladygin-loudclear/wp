<?php

namespace GL;

class Text extends Widget {
	private $_text;
	
	public function __construct($widget = array()) {
		$this->_text = $widget['text'];
	}

	public function getText() {
	    return $this->_text;
    }
	
	public function draw() {
	    View::load("Templates/Frontend/text", array('widget' => $this));
	}
}