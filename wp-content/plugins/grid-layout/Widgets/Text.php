<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Text extends Widget {
	public function getPreview() {
        return $this->data;
    }
	
	public function getText() {
	    return $this->data;
    }
	
	public function draw() {
	    View::load("Templates/Frontend/text", array('widget' => $this));
	}
}