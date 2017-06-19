<?php

namespace GL\Factories;


use GL\Interfaces\GlyphInterface;
use GL\Interfaces\WidgetRepositoryInterface;
use GL\Widgets\Basic\WP;

Class WidgetFactory {

    public static function getObject($name) {
    	$classes = array(
			"\\GL\\Widgets\\Basic\\".$name,
			"\\GL\\Widgets\\System\\".$name
		);
	
    	foreach($classes as $class) {
			try {
				return new $class;
			} catch (\Exception $e) {}
		}
    			
		throw new \Exception("Undefined widget $name");
    }
 
	/**
	 * @return WidgetRepositoryInterface|GlyphInterface
	 */
	public static function add($name) {
		$widget = self::getObject($name);
		return $widget;//->add();
	}

	/**
	 * @return WidgetRepositoryInterface
	 */
	public static function get($name, $id) {
		$widget = self::getObject($name);
		return $widget;//->find($id);
	}

    public static function factory($data = array()) {
        $widget = self::getObject($data['name']);
	    return $widget;
        $widget->fill($data);
		return $widget;
    }
}