<?php

namespace GL;

include dirname(__FILE__).'../Repositories/WidgetRepository.php';

Class WidgetRepository extends DB implements WidgetRepositoryInterface {
	
	protected $table;
	
	public function add($name) {
		self::$wpdb->insert('wp_gl_widget_' . $name, array('id' => NULL), array());
		return self::$wpdb->insert_id;
	}
	
	public function remove($id, $name) {
		return self::$wpdb->delete("wp_gl_widget_{$name}", array('id' => $id));
	}
	
	public function find($widget_name, $widget_id) {
		return self::$wpdb->get_row(" SELECT * FROM wp_gl_widget_{$widget_name} WHERE id = {$widget_id};", ARRAY_A);
	}
	
	public function save($widget_name, $widget_id, $data) {
		self::$wpdb->update("wp_gl_widget_{$widget_name}", $data, array('id' => $widget_id));
	}
}