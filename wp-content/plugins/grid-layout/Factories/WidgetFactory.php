<?php

namespace GL\Factories;


use GL\Interfaces\GlyphInterface;
use GL\Interfaces\WidgetRepositoryInterface;

Class WidgetFactory {

    public static function getObject($name) {
        try {
            $class = "\\GL\\Widgets\\".ucfirst($name);
            $widget = new $class;
        } catch (\Exception $e) {
            $class = "\\GL\\Widgets\\System\\".ucfirst($name);
            $widget = new $class;
        }

        return $widget;
    }

	/**
	 * @return WidgetRepositoryInterface|GlyphInterface
	 */
	public static function add($name) {
		$widget = self::getObject($name);
		return $widget->add();
	}

	/**
	 * @return WidgetRepositoryInterface
	 */
	public static function get($name, $id) {
		$widget = self::getObject($name);
		return $widget->find($id);
	}
	
    public static function factory($data = array()) {
        $widget = self::getObject($data['widget_name']);
        $widget->fill($data);
		return $widget;
    }
}