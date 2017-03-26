<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_Author_Link extends Widget {
	public function draw() {
		View::load('Templates/Frontend/post_author_link', array('widget' => $this));
	}
}