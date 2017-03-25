<?php

namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Sidebar extends Widget {
	public function draw() {
		View::load('Templates/Frontend/sidebar', array('widget' => $this));
	}
}