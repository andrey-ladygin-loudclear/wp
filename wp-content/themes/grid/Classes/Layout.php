<?php

namespace GL\Classes;

use GL\Factories\WidgetFactory;
use GL\Helpers\ObjectHelper;
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

		if(View::exists("Templates/Backend/Widgets/{$file}")) {
		    View::load("Templates/Backend/Widgets/{$file}", array(
                'widget' => $widget,
            ));
        } else {
            View::load("Templates/Backend/Widgets/default", array(
                'widget' => $widget,
            ));
        }
    }

    public function save_widget() {
        $data = ObjectHelper::clear($_POST);
        $data = ObjectHelper::wp_fields_convert_to_options($data);
        $widget_name = $data['widget-name'];
        $widget_id = $data['widget-id'];
        
        $widget = WidgetFactory::get($widget_name, $widget_id);
        $widget->fill($data);
		$widget->save();
	
		die(wp_redirect(wp_get_referer() . "&saved=1"));
		
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
        $id = WidgetFactory::add($name);
        $widget = WidgetFactory::getObject($name);

        echo json_encode(array(
            'name' => $name,
            'glyph' => $widget instanceof Glyph,
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

    public function import_widget() {
		$widgetToImport = $_POST['widgetToImport'];
//		$widgetToImport = WidgetFactory::get($widgetToImport['name'], $widgetToImport['id']);
		
		$destinationWidget = $_POST['destinationWidget'];
//		$destinationWidget = WidgetFactory::get($destinationWidget['name'], $destinationWidget['id']);
	
		$this->import($widgetToImport['id'], $destinationWidget['id']);
		
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
}