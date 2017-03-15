<?php

namespace GL\Factories;


use GL\Interfaces\GlyphInterface;
use GL\Interfaces\WidgetRepositoryInterface;

Class WidgetFactory {
	
	/**
	 * @return WidgetRepositoryInterface|GlyphInterface
	 */
	public static function add($name) {
		$class = "\\GL\\".ucfirst($name);
		$widget = new $class;
		return $widget->add();
	}
	/**
	 * @return WidgetRepositoryInterface
	 */
	public static function get($name, $id) {
		$class = "\\GL\\".ucfirst($name);
		$widget = new $class;
		return $widget->find($id);
	}
	
    public static function factory($name, $data = array()) {
        $class = "\\GL\\".ucfirst($name);
        $widget = new $class($data);
	
		if(!empty($data['widget_id'])) {
			$widget->setId($data['widget_id']);
		}
		
		if(!empty($data['row'])) {
			$widget->setRow($data['row']);
		}
		
		if(!empty($data['col'])) {
			$widget->setCol($data['col']);
		}
		
		if(!empty($data['size_x'])) {
			$widget->setWidth($data['size_x']);
		}
		
		if(!empty($data['size_y'])) {
			$widget->setHeight($data['size_y']);
		}
		
		if(!empty($data['full_widget'])) {
			$widget->setFull($data['full_widget']);
		}
		
		return $widget;
    }
}