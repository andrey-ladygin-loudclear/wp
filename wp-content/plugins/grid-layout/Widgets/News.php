<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class News extends Widget {

    public function add() {
        $this->id = 0;
        return $this;
    }

	public function draw() {
	    View::load("Templates/Frontend/news", array('widget' => $this));
	}
}