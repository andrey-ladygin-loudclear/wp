<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_thumbnail extends Widget {
	public function draw() {
		View::load('Templates/Frontend/post_thumbnail', array('widget' => $this));
	}
}