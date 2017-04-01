<?php

namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Gallery extends Widget {
	public $images;

//https://colorlib.com/wp/free-wordpress-themes//
	public $schema = [
		'loop' => 'bool',
		'margin' => 'int',
		'items' => 'int',
		'autoplay' => 'bool',
		'dots' => 'bool',
		'nav' => 'bool',
		'autoplayTimeout' => array(
			'label' => 'Autoplay Timeout',
			'type' => 'int',
			'default' => '3000',
		),
		'autoplayHoverPause' => array(
			'label' => 'Autoplay Hover Pause',
			'type' => 'bool',
			'default' => '1',
		),
		'animateOut' => array(
			'label' => 'Animate Out',
			'type' => 'select',
			'values' => array(
				'slideOutUp' => 'slideOutUp',
				'fadeOut' => 'fadeOut',
				'flipOutX' => 'flipOutX'
			),
            'default' => 'slideOutUp',
		),
		'animateIn' => array(
		    'label' => 'Animate In',
			'type' => 'select',
			'values' => array(
				'slideInDown' => 'slideInDown',
				'fadeIn' => 'fadeIn',
				'flipInX' => 'flipInX'
			),
            'default' => 'slideInDown',
        ),
	];
	
	protected $js = array(
		'assets/plugins/owlcarousel/js/owl.carousel.js'
	);
	
	protected $css = array(
		'assets/plugins/owlcarousel/css/owl.carousel.css',
		'assets/plugins/owlcarousel/css/owl.theme.default.css',
	);
	
	public function getImages() {
		return $this->data;
	}
	
	public function getPreview() {
		if(!empty($this->getImages())) {
			$output = '';
			
			foreach($this->getImages() as $image) {
				$output .= "<img src='{$image}' width='100px' height='100px'>";
			}
			
			return $output;
		}
		
		return '';
    }
    
	public function draw() {
        View::load("Templates/Frontend/gallery", array('widget' => $this));
	}
}