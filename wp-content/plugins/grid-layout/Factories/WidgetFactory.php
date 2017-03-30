<?php

namespace GL\Factories;


use GL\Interfaces\GlyphInterface;
use GL\Interfaces\WidgetRepositoryInterface;
use GL\Widgets\WP;

Class WidgetFactory {

    public static function getObject($name) {
		try {
            $widget = self::getWidget($name);
        } catch (\Exception $e) {
        	try {
				$widget = self::getSystemWidget($name);
			} catch (\Exception $e) {
				try {
					$widget = self::getStaticWidget($name);
				} catch (\Exception $e) {
					$widget = self::getWpWidget($name);
				}
			}
        }
        
        return $widget;
    }

    public static function getWidget($name) {
		$class = "\\GL\\Widgets\\".ucfirst(strtolower($name));
		return new $class;
	}
	
    public static function getSystemWidget($name) {
		$class = "\\GL\\Widgets\\System\\".ucfirst(strtolower($name));
		return new $class;
	}
	
    public static function getStaticWidget($name) {
		$class = "\\GL\\Widgets\\Components\\".ucfirst(strtolower($name));
		return new $class;
	}
	
    public static function getWpWidget($name) {
		return new WP();
		
		global $wp_widget_factory;
		
		if(!empty($wp_widget_factory->widgets[$name]))
		{
			return new WP($name);
		}
		
		throw new \Exception();
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
        $widget = self::getObject($data['name']);
        $widget->fill($data);
		return $widget;
    }
}