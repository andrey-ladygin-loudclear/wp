<?php

namespace GL;
include dirname(__FILE__).'/WidgetFactory.php';

Class Structure {

    public static function getWidgets($parent_id, $parent_type = 'page') {
        $gldb = DB::getInstance();
        $widgets = $gldb->getWidgetsHierarchy($parent_id, $parent_type);
//        echo "<pre>";
//        print_r($widgets);
//        die;


        foreach($widgets as &$widget) {
            $widget = WidgetFactory::factory($widget);
        }

        return $widgets;
    }

}