<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class WP extends Widget {
	public $instance;
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
	
	public function fill(array $attributes) {
		$this->name = $attributes['name'];
		$this->instance = (array) json_decode($attributes['options']);
		$this->args = (array) json_decode($attributes['args']);
		return parent::fill($attributes);
	}
	
	public function save($widget_id, $data) {
		if(!empty($data['instance'])){
			$data['options'] = json_encode($data['instance']);
		}
		
		if(!empty($data['args'])) {
			$data['args'] = json_encode($data['args']);
		}
		parent::save($widget_id, $data);
	}
	
	public function getPreview() {
		return $this->name;
	}
	
	public function getStylesDir() {
		return $this->name;
	}
	
	public function draw() {
		View::load("Templates/Frontend/WP", array('widget' => $this));
	}
}