<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_Permalink extends Widget {
	public function draw() {
		View::load('Templates/Frontend/post_permalink', array('widget' => $this));
	}
}