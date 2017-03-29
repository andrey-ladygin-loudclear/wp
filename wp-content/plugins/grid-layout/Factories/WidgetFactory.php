<?php

namespace GL\Factories;


use GL\Interfaces\GlyphInterface;
use GL\Interfaces\WidgetRepositoryInterface;

Class WidgetFactory {

    public static function getObject($name) {
		$name = strtolower($name);
		
        try {
            $widget = self::getWidget($name);
        } catch (\Exception $e) {
        	try {
				$widget = self::getSystemWidget($name);
			} catch (\Exception $e) {
				$widget = self::getStaticWidget($name);
			}
        }
        
        return $widget;
    }

    public static function getWidget($name) {
		$class = "\\GL\\Widgets\\".ucfirst($name);
		return new $class;
	}
	
    public static function getSystemWidget($name) {
		$class = "\\GL\\Widgets\\System\\".ucfirst($name);
		return new $class;
	}
	
    public static function getStaticWidget($name) {
		$class = "\\GL\\Widgets\\Components\\".ucfirst($name);
		return new $class;
	}
 
	/**
	 * @return WidgetRepositoryInterface|GlyphInterface
	 */
	public static function add($name, $options = array()) {
		$widget = self::getObject($name);
		return $widget->add($options);
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