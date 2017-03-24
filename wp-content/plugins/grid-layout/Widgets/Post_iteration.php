<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Glyph;

class Post_iteration extends Glyph {
	public function draw() {
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				View::load("Templates/Frontend/glyph", array('widget' => $this));
			}
		}
		//https://wp-kama.ru/function/the_post
	}
}