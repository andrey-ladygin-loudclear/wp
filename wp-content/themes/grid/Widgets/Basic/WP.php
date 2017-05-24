<?php


namespace GL\Widgets\Basic;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class WP extends Widget {
	public $options;
	public $args;
	public $name;
	
//	public function setOptions() {
//		$class = $this->name;
//		$dummy = new $class();
//		$settings = $dummy->widget_options;
//		$options = get_option($dummy->option_name);
//
//		if(!empty($options[2])) {
//			$this->options = $options[2];
//		}
//	}
	
//	public function fill(array $attributes) {
//		$this->instance = (array) json_decode($attributes['options']);
//		$this->args = (array) json_decode($attributes['args']);
//		return parent::fill($attributes);
//	}
	
//	public function save($widget_id, $data) {
//		if(!empty($data['instance'])){
//			$data['options'] = json_encode($data['instance']);
//		}
//
//		if(!empty($data['args'])) {
//			$data['args'] = json_encode($data['args']);
//		}
//		parent::save($widget_id, $data);
//	}

	public function getBackendTemplate() {
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