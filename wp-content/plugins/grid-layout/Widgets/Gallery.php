<?php

namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Gallery extends Widget {
	protected static $table = 'gl_widget_gallery';
	protected $fillable = ['images'];
	
	public $images;
	
	public $options = [
		'classes' => 'well'
	];
	
	protected $js = array(
		'assets/plugins/owlcarousel/js/owl.carousel.js'
	);
	
	protected $css = array(
		'assets/plugins/owlcarousel/css/owl.carousel.css',
		'assets/plugins/owlcarousel/css/owl.theme.default.css',
	);
	
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
    
	public function draw() {
        View::load("Templates/Frontend/gallery", array('widget' => $this));
	}
}