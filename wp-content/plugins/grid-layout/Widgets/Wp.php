<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class WP extends Widget {
	protected static $table = 'gl_wp_widgets';
	
	public $instance;
	public $args;
	public $name;
	
	public function save($widget_id, $data) {
		$data['instance'] = json_encode($data['instance']);
		$data['args'] = json_encode($data['args']);
		parent::save($widget_id, $data);
	}
	
	public function fill(array $attributes) {
		$this->name = $attributes['name'];
		$this->instance = (array) json_decode($attributes['instance']);
		$this->args = (array) json_decode($attributes['args']);
		return parent::fill($attributes);
	}
	
	public function getPreview() {
		return $this->name;
	}
	
	public function draw() {
		View::load("Templates/Frontend/WP", array('widget' => $this));
	}
}