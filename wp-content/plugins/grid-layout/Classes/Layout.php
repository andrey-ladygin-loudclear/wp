<?php

namespace GL\Classes;

use GL\Factories\WidgetFactory;
use GL\Repositories\LayoutRepository;
use GL\Widgets\System\Glyph;

Class Layout extends LayoutRepository {

    public function edit() {
        $widget_name = $_GET['widget-name'];
        $widget_id = $_GET['widget-id'];
        $widget = WidgetFactory::get($widget_name, $widget_id);
    	Assets::addDefaults();
		Assets::enqueue();
		
		$file = $widget_name;
		
		if(method_exists($widget, 'getBackendTemplate')) {
			$file = $widget->getBackendTemplate();
		}
		
		View::load("Templates/Backend/{$file}", array(
            'widget' => $widget,
        ));
    }

    public function save_widget() {
        $data = $_POST;
        $widget_name = $data['widget-name'];
        $widget_id = $data['widget-id'];
	
        $widget = WidgetFactory::get($widget_name, $widget_id);
		$widget->fill($data);
		$widget->save();
		
		$view = View::make('Templates/Components/SaveSuccess', array('name' => $widget_name));
        $assets = new Assets();
        $assets->addJquery();
        $assets->addBootstrap();
        $view->add_assets($assets);
        $view->show();
    }
    
    public function get_widget_preview() {
		$widget_name = $_POST['name'];
		$widget_id = $_POST['id'];
		$widget = WidgetFactory::get($widget_name, $widget_id);
		echo json_encode(array(
			'title' => $widget->getTitle(),
			'preview' => $widget->getPreview(),
		));
		wp_die();
	}

    public function add_widget() {
        $name = $_POST['name'];
        $options = $_POST['options'];
        $id = WidgetFactory::add($name, $options);

        echo json_encode(array(
            'name' => $name,
            'id' => $id
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
    	Assets::addDefaults();
		Assets::enqueue();
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