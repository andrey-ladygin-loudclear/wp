<?php

namespace GL;
include dirname(__FILE__).'/DB.php';
include dirname(__FILE__).'/Assets.php';
include dirname(__FILE__).'/View.php';

Class Layout {

    private $gldb;

    public function __construct() {
        $this->gldb = DB::getInstance();
    }

    public function gl_edit_widget_page() {
        $widget_name = $_GET['widget-name'];
        $widget_id = $_GET['widget-id'];
        $widget = $this->gldb->getWidget($widget_name, $widget_id);
        
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

    public function gl_save_widget_page() {
        $data = $_POST;
        $widget_name = $data['widget-name'];
        $widget_id = $data['widget-id'];
        unset($data['action']);
        unset($data['widget-name']);
        unset($data['widget-id']);

        $this->gldb->updateWidget($widget_name, $widget_id, $data);
        $view = View::make('Templates/Backend/SaveSuccess', array('name' => $widget_name));
        $assets = new Assets();
        $assets->addJquery();
        $assets->addBootstrap();
        $view->add_assets($assets);
        $view->show();
    }

    public function gl_ajax_add_widget_callback() {
        $name = $_POST['name'];
        $id = $this->gldb->addWidget($name);
        echo json_encode(array(
            'name' => $name,
            'id' => $id
        ));
        wp_die();
    }

    public function gl_ajax_delete_widget_callback() {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $this->gldb->deleteWidget($id, $name);

        wp_die();
    }

    public function gl_ajax_save_widget_callback() {
        $json = $_POST['gl_json'];
        $post_id = $_POST['page_id'];
        $parent_type = $_POST['parent_type'];
        $this->save_layout_structure($json, $post_id, $parent_type);

        wp_die();
    }

    public function grid_layout_html($post) {
        $widgets = $this->gldb->getGrid($post->ID, 'page');
        View::load('Templates/Backend/layout', array('widgets' => $widgets));
    }

    public function gl_save_grid_layout( $post_id, $post, $update ) {

        $post_type = get_post_type($post_id);
        if ("grid" != $post_type) return;

        $json = json_decode(stripcslashes($_POST['gl_json']));

		if(!empty($json)) {
			$this->save_layout_structure($json, $post_id);
		}
    }
}