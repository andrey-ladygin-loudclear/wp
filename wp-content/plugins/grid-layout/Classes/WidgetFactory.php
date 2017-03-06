<?php

namespace GL;
include dirname(__FILE__).'/Widget.php';
include dirname(__FILE__).'/../Widgets/Glyph.php';
include dirname(__FILE__).'/../Widgets/Image.php';
include dirname(__FILE__).'/../Widgets/Text.php';

Class WidgetFactory {

    public static function factory($widget) {
        $class = "\\GL\\".ucfirst($widget['widget_name']);
        return new $class($widget);
    }

}