<?php

namespace GL\Classes;

use GL\Factories\WidgetFactory;

Class Styles {
    
    public function view() {
        $widget_name = $_GET['widget-name'];
        $widget_id = $_GET['widget-id'];
        $widget = WidgetFactory::get($widget_name, $widget_id);
		Assets::addDefaults();
		Assets::addWidgetView();
		Assets::enqueue();
	
		$scss = new Scss();
		$scss->loadDir($widget->name);
		
		View::load('Templates/Backend/style', array(
			'widget' => $widget,
			'scss' => $scss,
		));
    }
    
    public function change() {
		$widget_name = $_POST['styles_dir'];
		$style = $_POST['style'];
		$widgetID = $_POST['widget_id_attribute'];
		$scss = new Scss();
		$scss->loadDir($widget_name);
		$scss->selectCurrentStyles($style);
		$scss->loadStyles();
		$scss->replaceWidgetIdWith($widgetID);
		echo $scss->compile();
		wp_die();
	}
    
    public function save() {
		$style = $_POST['style'];
		$widget_name = $_POST['widget_name'];
		$widget_id = $_POST['widget_id'];
		$widget = WidgetFactory::get($widget_name, $widget_id);
		$widget->save($widget_id, array(
			'style' => !empty($style) ? $style : NULL
		));
		wp_die();
	}
}