<?php
/*
Plugin Name: Grid Layout
Plugin URI: http://grid-layout.php
Description: Grid Layout
Version: 0.1
Author: Andrey Ladygin
Author URI: http://google.com
*/

include "Classes/Layout.php";

class GL_Grid_Layout {
	public static $PLUG_DIR;
	public static $PLUG_URL;
	
    public function __construct() {
		self::$PLUG_URL = plugins_url('/', __FILE__);
		//self::$PLUG_DIR = dir(__FILE__);
		
        $this->layout = new \GL\Layout();
        $this->assets = new \GL\Assets();

        add_action('init', array($this, 'create_grid_post_type'));
        add_action('admin_init', array($this, 'enqueue_scripts'));
        add_action('add_meta_boxes', array($this, 'add_meta_box'));

        add_action('wp_ajax_gl_ajax_add_widget', array($this->layout, 'add_widget'));
        add_action('wp_ajax_gl_ajax_save_widget', array($this->layout, 'save_widget'));
        add_action('wp_ajax_gl_ajax_delete_widget', array($this->layout, 'delete_widget'));
        add_action('save_post', array($this->layout, 'save_grid'), 10, 3);

        add_action('admin_menu', array($this, 'my_cool_plugin_create_menu'));

        add_action('gl_edit_widget_action', array($this, 'edit_action_callback'));
        add_action('gl_save_widget_action', array($this, 'save_action_callback'));
	
	
	
		function bartag_func( $atts ) {
			$atts = shortcode_atts( array(
				'foo' => 'no foo',
				'baz' => 'default baz'
			), $atts, 'bartag' );
		
			return "foo = {$atts['foo']}";
		}
		add_shortcode( 'bartag', 'bartag_func' );
    }

    public function create_grid_post_type() {
        $post_type = 'grid';
        register_post_type( $post_type,
            array(
                'labels' => array(
                    'name' => __( 'Grid Layout' ),
                    'singular_name' => __( 'Grid' )
                ),
                'public' => true,
                'has_archive' => true,
            )
        );
        remove_post_type_support($post_type, 'editor');
    }

    public function enqueue_scripts() {
		$this->assets->addDefaults();
		
		foreach($this->assets->getCss() as $css) {
			wp_enqueue_style($css['name'], $css['src']);
		}
		foreach($this->assets->getJs() as $js) {
			wp_enqueue_script($js['name'], $js['src']);
		}
    }

    public function add_meta_box() {
        add_meta_box( 'grid-meta-box-id', 'Grid Layout', array($this->layout, 'grid'), 'grid', 'normal', 'high' );
    }

    public function my_cool_plugin_create_menu() {
        add_menu_page('My Cool Plugin Settings', 'Cool Settings', 'administrator', 'grid-layout', array($this->layout, 'edit') , plugins_url('/images/icon.png', __FILE__) );
    }

    public function check_actions() {
        if(!empty($_GET['action']) && $_GET['action'] == 'gl_edit_widget_action') {
            do_action('gl_edit_widget_action');
        }
        if(!empty($_POST['action']) && $_POST['action'] == 'gl_save_widget_action') {
            do_action('gl_save_widget_action');
        }
    }

    public function edit_action_callback() {
        $this->layout->edit();
    }
    public function save_action_callback() {
        $this->layout->save();
    }
}

$gl_grid_layout = new GL_Grid_Layout();
$gl_grid_layout->check_actions();



