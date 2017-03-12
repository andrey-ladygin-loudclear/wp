<?php

namespace GL;

class Image extends Widget {
	private $_src;
	
	public function __construct($widget = array()) {
		$this->_src = $widget['src'];
	}

	public function getSrc() {
	    return $this->_src;
    }
	//http://jeroensormani.com/how-to-include-the-wordpress-media-selector-in-your-plugin/
	public function draw() {
        View::load("Templates/Frontend/image", array('widget' => $this));
	}
}