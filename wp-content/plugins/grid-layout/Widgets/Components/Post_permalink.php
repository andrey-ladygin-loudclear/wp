<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_permalink extends Widget {
	public function draw() {
		View::load('Templates/Frontend/post_content', array('widget' => $this));
	}
}