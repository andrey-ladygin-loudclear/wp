<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_content extends Widget {
	public function draw() {
		View::load('Templates/Frontend/post_content', array('widget' => $this));
		//$content = get_the_content();
	    //$content = preg_replace('/\[gl-grid-tag id="(.*)"\]/i', '', $content);
	    //echo ($content);die;
		//echo 'CONTENT';
	}
}