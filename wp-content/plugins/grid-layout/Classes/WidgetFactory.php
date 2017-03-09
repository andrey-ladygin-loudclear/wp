<?php

namespace GL;
include_once dirname(__FILE__).'/Widget.php';
include_once dirname(__FILE__).'/../Widgets/System/Glyph.php';
include_once dirname(__FILE__).'/../Widgets/System/Blank.php';
include_once dirname(__FILE__).'/../Widgets/System/Row.php';
include_once dirname(__FILE__).'/../Widgets/Image.php';
include_once dirname(__FILE__).'/../Widgets/Text.php';
include_once dirname(__FILE__).'/../Widgets/Block.php';

Class WidgetFactory {

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