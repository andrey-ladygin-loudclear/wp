<?php

namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Image extends Widget {
	protected static $table = 'gl_widget_image';
	
	public $src;
	
	public function fill(array $attributes) {
		$this->src = $attributes['src'];
		return parent::fill($attributes);
	}
	
	public function getSrc() {
	    return $this->src;
    }
	//http://jeroensormani.com/how-to-include-the-wordpress-media-selector-in-your-plugin/
	public function draw() {
        View::load("Templates/Frontend/image", array('widget' => $this));
	}
}