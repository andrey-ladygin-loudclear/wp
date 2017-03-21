<?php
/*
Plugin Name: Grid Layout
Plugin URI: http://grid-layout.php
Description: Grid Layout
Version: 0.1
Author: Andrey Ladygin
Author URI: http://google.com
*/

//include "Classes/Layout.php";

use GL\Classes\Assets;
use GL\Classes\Layout;
use GL\Classes\Settings;

class GL_Grid_Layout {
	public static $PLUG_DIR;
	public static $PLUG_URL;
	
	public static $widgets = array(
		'news' => 'News',
		'glyph' => 'Block',
		'image' => 'Image',
		'text' => 'Text',
	);
	
    public function __construct() {
		self::$PLUG_URL = plugins_url('/', __FILE__);
		//self::$PLUG_DIR = dir(__FILE__);
	
		
		// if __autoload is active, put it on the spl_autoload stack
		if ( is_array(spl_autoload_functions()) && in_array( '__autoload', spl_autoload_functions()) ) {
			spl_autoload_register('__autoload');
		}
	
		// Add the autoloader
		spl_autoload_register(array($this, 'autoloader'));
		
        $this->layout = new Layout();
        $this->assets = new Assets();
        $this->settings = new Settings();

        add_action('init', array($this, 'create_grid_post_type'));
        add_action('admin_init', array($this, 'enqueue_scripts'));
        add_action('add_meta_boxes', array($this, 'add_meta_box'));

        add_action('wp_ajax_gl_ajax_add_widget', array($this->layout, 'add_widget'));
        add_action('wp_ajax_gl_ajax_delete_widget', array($this->layout, 'delete_widget'));
		add_action('wp_ajax_gl_ajax_save_layout', array($this->layout, 'save_layout'));
        add_action('save_post', array($this->layout, 'save_grid'), 10, 3);

        add_action('admin_menu', array($this, 'add_settings_menu_page'));

        add_action('gl_edit_widget_action', array($this, 'edit_action_callback'));
        add_action('gl_save_widget_action', array($this, 'save_action_callback'));
	
		add_filter('the_content', array($this, 'the_content_filter'));
		
		add_shortcode('gl-grid-tag', array($this, 'shortcode'));
    }
    
    public function shortcode($atts) {
		$atts = shortcode_atts( array(
			'foo' => 'no foo',
			'baz' => 'default baz'
		), $atts, 'bartag' );
	
		return "foo = {$atts['foo']}";
	}
    
    public function the_content_filter($content) {
		var_dump(get_the_ID());die;
		// assuming you have created a page/post entitled 'debug'
		if ($GLOBALS['post']->post_name == 'debug') {
			return var_export($GLOBALS['post'], TRUE );
		}
		// otherwise returns the database content
		return $content;
	}
    
    public function autoloader($class) {
    	if(strstr($class, "GL") === FALSE) {
    		return;
		}
    	
		$class = str_replace('GL', '', $class);
		$class = str_replace('\\', '/', $class);
		$file = dirname(__FILE__) . "/{$class}.php";
		
		
		if(file_exists($file)) {
			include $file;
			return;
		}
		
		throw new Exception("File does not exists {$file}");
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
		wp_enqueue_media();
		
		foreach($this->assets->getCss() as $css) {
			wp_enqueue_style($css['name'], $css['src']);
		}
		foreach($this->assets->getJs() as $js) {
			wp_enqueue_script($js['name'], $js['src']);
		}
    }

    public function add_meta_box() {
        add_meta_box('grid-meta-box-id', 'Grid Layout', array($this->layout, 'grid'), 'grid', 'normal', 'high');
    }

    public function add_settings_menu_page() {
		add_options_page('My Cool Plugin Settings', 'Cool Settings', 'administrator', 'grid-layout', array($this->settings, 'page'));
        add_submenu_page('edit.php?post_type=grid', 'Grid Layout', 'Settings', 'administrator', 'grid-layout-options', array($this->settings, 'page'));
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
        $this->layout->save_widget();
    }
}

$gl_grid_layout = new GL_Grid_Layout();
$gl_grid_layout->check_actions();



