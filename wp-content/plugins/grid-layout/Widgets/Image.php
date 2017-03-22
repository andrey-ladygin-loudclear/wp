<?php

namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Image extends Widget {
	protected static $table = 'gl_widget_image';
	
	public $images;
	
	public function fill(array $attributes) {
		$this->images = json_decode($attributes['images']);
		return parent::fill($attributes);
	}
	
	public function save($widget_id, $data) {
		$data['images'] = json_encode($data['images']);
		parent::save($widget_id, $data);
	}
	
	public function getPreview() {
		if(!empty($this->images)) {
			$output = '';
			
			foreach($this->images as $image) {
				$output .= "<img src='{$image}' width='100px'>";
			}
			
			return $output;
		}
		
		return '';
    }
	
	public function getSrc() {
	    return $this->images;
    }
    
	public function draw() {
        View::load("Templates/Frontend/image", array('widget' => $this));
	}
}