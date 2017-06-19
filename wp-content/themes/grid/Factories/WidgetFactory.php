<?php

namespace GL\Factories;


use GL\Interfaces\GlyphInterface;
use GL\Interfaces\WidgetRepositoryInterface;
use GL\Widgets\Basic\WP;

Class WidgetFactory {

    public static function getObject($name) {
        $classes = array(
            "\\GL\\Widgets\\Basic\\".ucfirst(strtolower($name)),
            "\\GL\\Widgets\\System\\".ucfirst(strtolower($name)),
            "\\GL\\Widgets\\Specified\\".ucfirst(strtolower($name)),
            "\\GL\\Widgets\\Components\\".ucfirst(strtolower($name)),
            "\\GL\\Widgets\\Childs\\".ucfirst(strtolower($name)),
        );

        foreach($classes as $class) {
            try {
                return new $class;
            } catch (\Exception $e) {}
        }

        if(empty($widget)) {
            $widget = new WP();
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
        $widget = self::getObject($data['name']);
        $widget->fill($data);
        return $widget;
    }
}