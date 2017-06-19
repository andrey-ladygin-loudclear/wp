<?php

namespace GL\Classes;

use GL\Factories\WidgetFactory;

Class Config {
	CONST DEBUG = FALSE;

	public static $widgets = array(
        'My_Widget' => 'My Widget',
	);
	
	public static $excluded_post_types = array(
		'attachment',
		'revision',
		'nav_menu_item',
		'custom_css',
		'customize_changeset',
		'grid', // it necessarily for this post type
	);
	
	public static $fonts = array(
		'sans-serif' => 'Open Sans',
		'Arial' => 'Arial',
		'Conv_MontserratAlternates-Black' => 'Montserrat Alternates',
		'Conv_MontserratAlternates-Bold' => 'Montserrat Alternates Bold',
		'Conv_MontserratAlternates-Light' => 'Montserrat Alternates Light',
		'Conv_MontserratAlternates-Medium' => 'Montserrat Alternates Medium',
		'Conv_Montserrat-Bold' => 'Montserrat Bold',
		'Conv_Montserrat-Medium' => 'Montserrat Medium',
		'Conv_Montserrat-Regular' => 'Montserrat Regular',
		'Conv_Roboto-Bold' => 'Roboto Bold',
		'Conv_Roboto-Light' => 'Roboto Light',
		'Conv_Roboto-Regular' => 'Roboto Regular',
	);
	
	public static $themes = array(
		'light' => array(
			'grid_text_color' => '#000000',
		),
		'wood' => array(
			'grid_text_color' => '#d3d3d3',
		),
		'dark' => array(
			'grid_text_color' => '#d3d3d3',
			'elements' => array(
				'h1' => array(
					'size' => '26px'
				)
			),
		),
	);
	
	public static $elements = array(
		'h1' => 'Title',
		'h2' => 'Widget Title',
		'h3' => 'Head',
		'a' => 'Link',
		'p' => 'Text'
	);
	
	//add fonts from google docs
	
	public static function get($name) {
		return WidgetFactory::getObject($name);
	}
	
	public static function getWPWidgets() {
		global $wp_widget_factory;
		$widgets = array();
		
		foreach($wp_widget_factory->widgets as $name => $widget) {
			$widgets[$name] = $widget->name;
		}
		
		return $widgets;
	}
}