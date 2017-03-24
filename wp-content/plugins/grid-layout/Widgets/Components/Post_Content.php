<?php


namespace GL\Widgets\Components;

use GL\Widgets\System\Widget;

class Post_content extends Widget {
	public function draw() {
	    the_content();
	}
}