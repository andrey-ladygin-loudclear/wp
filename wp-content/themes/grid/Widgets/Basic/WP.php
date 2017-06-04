<?php


namespace GL\Widgets\Basic;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class WP extends Widget {
	public $options;
	public $args;
	public $name;
    public $dummy;

	public function getBackendTemplate() {
        $class = $this->name;
        $this->dummy = new $class();
        return 'wp';
	}

	public function getName() {
		return $this->name;
	}
	
	public function getPreview() {
		global $wp_widget_factory;
		
		if(!empty($wp_widget_factory->widgets[$this->name]->name)) {
			return $wp_widget_factory->widgets[$this->name]->name;
		}
		
		return '';
	}
	
	public function getStylesDir() {
		return $this->name;
	}
	
	public function draw() {
		View::load("Templates/Frontend/Widgets/WP", array('widget' => $this));
	}
}