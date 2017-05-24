<?php

namespace GL\Widgets\Basic;

use GL\Classes\View;
use GL\Widgets\System\Glyph;
use GL\Widgets\System\Widget;

class Carousel extends Glyph {
	public $images;

	public $schema = [
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
	];
	
	protected $js = array(
		'assets/plugins/owlcarousel/js/owl.carousel.js'
	);
	
	protected $css = array(
		'assets/plugins/owlcarousel/css/owl.carousel.css',
		'assets/plugins/owlcarousel/css/owl.theme.default.css',
	);
	
	public function getPreview() {
		return '';
	}
	
	public function draw() {
		View::load("Templates/Frontend/Widgets/carousel", array('widget' => $this));
	}
}