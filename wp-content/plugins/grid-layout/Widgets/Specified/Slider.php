<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Slider extends Widget {
	//http://testbase.info/c/theme/wp/ascent/
	public function draw() {
	    View::load("Templates/Frontend/text", array('widget' => $this));
	}
}