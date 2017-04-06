<?php

namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Gallery extends Widget {
	public $images;
    
    public $options = array(
        'loop' => '1',
        'margin' => '20',
        'items' => '3',
        'autoplay' => '0',
        'dots' => '1',
        'nav' => '1',
        'autoplayTimeout' => '3000',
        'autoplayHoverPause' => '1',
        'animateOut' => 'slideOutUp',
        'animateIn' => 'slideInDown',
    );
    
//https://colorlib.com/wp/free-wordpress-themes//
	public $schema = array(
		'loop' => 'bool',
		'margin' => array(
			'label' => 'Margin',
			'type' => 'int',
			'default' => '20',
		),
		'items' => array(
			'label' => 'Number of items',
			'type' => 'int',
			'default' => '3',
		),
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
    );
	
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