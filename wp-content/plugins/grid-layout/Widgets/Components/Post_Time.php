<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_Time extends Widget {
	public function draw() {
		View::load('Templates/Frontend/callback', array(
			'widget' => $this,
			'func' => 'the_time',
		));
	}
}