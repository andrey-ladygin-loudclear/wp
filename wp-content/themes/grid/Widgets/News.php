<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class News extends Widget {

// add NULL value for widget_id in DB
// add empty widget repository
// add admin view for widgets
// add composition of views for admin layouts
// add ability add list of views for admin layout
	public function draw() {
	    View::load("Templates/Frontend/news", array('widget' => $this));
	}
}