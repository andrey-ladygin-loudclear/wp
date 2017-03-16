<?php

namespace GL\Classes;

use GL\Factories\WidgetFactory;
use GL\Repositories\LayoutRepository;

Class Layout extends LayoutRepository {

    public function edit() {
        $widget_name = $_GET['widget-name'];
        $widget_id = $_GET['widget-id'];
        $widget = WidgetFactory::get($widget_name, $widget_id);
        
		$assets = new Assets();
		$assets->addJquery();
		$assets->addBootstrap();
		$assets->addJqueryUI();
		$assets->addTinyMCE();
		$assets->addMainScript();
		
		if($widget_name == 'glyph') {
			$assets->addGridister();
			$assets->addLayout();
		}
		
		$view = View::make("Templates/Backend/{$widget_name}", array(
            'widget_name' => $widget_name,
            'widget_id' => $widget_id,
            'widget' => $widget,
        ));
	
		$view->add_assets($assets);
		$view->show();
    }

    public function save_widget() {
        $data = $_POST;
        $widget_name = $data['widget-name'];
        $widget_id = $data['widget-id'];
        unset($data['action']);
        unset($data['widget-name']);
        unset($data['widget-id']);

        $widget = WidgetFactory::get($widget_name, $widget_id);
		$widget->save($widget_id, $data);
        
		$view = View::make('Templates/Backend/SaveSuccess', array('name' => $widget_name));
        $assets = new Assets();
        $assets->addJquery();
        $assets->addBootstrap();
        $view->add_assets($assets);
        $view->show();
    }

    public function add_widget() {
        $name = $_POST['name'];
        $widget = WidgetFactory::add($name);
        echo json_encode(array(
            'name' => $name,
            'id' => $widget->getId()
        ));
        wp_die();
    }

    public function delete_widget() {
        $name = $_POST['name'];
        $id = $_POST['id'];
		$widget = WidgetFactory::get($name, $id);
		$widget->remove();

        wp_die();
    }

    public function save_layout() {
        $json = $_POST['gl_json'];
        $post_id = $_POST['page_id'];
        $parent_type = $_POST['parent_type'];
        $this->save($json, $post_id, $parent_type);

        wp_die();
    }

    public function grid($post) {
        //json_encode(get_object_vars($error));
        //JsonSerializable::jsonSerialize
        $widgets = $this->getGrid($post->ID, 'page');
        View::load('Templates/Backend/layout', array('widgets' => $widgets));
    }

    public function save_grid($post_id, $post, $update) {

        $post_type = get_post_type($post_id);
        if("grid" != $post_type) return;

        $json = json_decode(stripcslashes($_POST['gl_json']));

		if(!empty($json)) {
			$this->save($json, $post_id);
		}
    }
}