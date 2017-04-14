<?php


namespace GL\Widgets\Specified;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Blackquote extends Widget {
	//https://themeisle.com/demo/?theme=Zerif+Lite&ref=5257
	public function draw() {
	    View::load("Templates/Frontend/Widgets/Specified/text", array('widget' => $this));
	}
}