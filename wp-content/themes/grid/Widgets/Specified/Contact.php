<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Contact extends Widget {
	//https://themeisle.com/demo/?theme=Zerif+Lite&ref=5257
	public function draw() {
	    View::load("Templates/Frontend/text", array('widget' => $this));
	}
}