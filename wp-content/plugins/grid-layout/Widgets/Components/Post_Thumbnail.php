<?php


namespace GL\Widgets\Components;

use GL\Widgets\System\Widget;

class Post_thumbnail extends Widget {
	public function draw() {
		if (has_post_thumbnail()) {
			the_post_thumbnail();
		}
	}
}