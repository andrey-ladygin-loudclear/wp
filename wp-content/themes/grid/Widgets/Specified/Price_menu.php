<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Price_menu extends Widget {
	//https://themedemos.webmandesign.eu/auberge/
	public function draw() {
	    View::load("Templates/Frontend/text", array('widget' => $this));
	}
}