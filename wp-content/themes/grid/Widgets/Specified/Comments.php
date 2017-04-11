<?php


namespace GL\Widgets\Specified;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Comments extends Widget {
	//https://www.competethemes.com/tracks-live-demo/this-is-a-standard-post/
	
	public function draw() {
		View::load("Templates/Frontend/Specified/comments", array('widget' => $this));
	}
}