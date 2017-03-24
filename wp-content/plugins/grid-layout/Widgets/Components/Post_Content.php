<?php


namespace GL\Widgets\Components;

use GL\Widgets\System\Widget;

class Post_content extends Widget {
	public function draw() {
	    //the_content();
	    $content = get_the_content();
	    $content = preg_replace('/\[gl-grid-tag id="(.*)"\]/i', '', $content);
	    echo ($content);die;
		//echo 'CONTENT';
	}
}