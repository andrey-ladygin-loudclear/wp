<?php

namespace GL\Classes;

use GL\Factories\WidgetFactory;
use GL\Repositories\LayoutRepository;

Class Structure {

    public static function getWidgets($parent_id, $parent_type = 'page') {
        $layout = new LayoutRepository();
        $widgets = $layout->getHierarchy($parent_id, $parent_type);
		
		if(empty($widgets)) {
			return array();
		}
		
        foreach($widgets as &$widget) {
            $widget = WidgetFactory::factory($widget);
        }
        
        return $widgets;
    }
    
    public static function check($parent_id, $parent_type = 'page') {
        $layout = new LayoutRepository();
        $widgets = $layout->getHierarchy($parent_id, $parent_type);
        return !empty($widgets);
    }

}