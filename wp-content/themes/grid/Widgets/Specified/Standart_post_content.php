<?php


namespace GL\Widgets\Specified;

use GL\Classes\View;
use GL\Widgets\System\Glyph;
use GL\Widgets\System\Widget;

class Standart_post_content extends Glyph {
	public $schema = array();
	
	public function draw() {
		View::load("Templates/Frontend/Widgets/Specified/standart_post_content", array('widget' => $this));
	}
}