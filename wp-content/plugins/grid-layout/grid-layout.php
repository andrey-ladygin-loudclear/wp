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
use GL\Facades\WidgetCompositionFacade;

class GL_Grid_Layout {
	public static $PLUG_DIR;
	public static $PLUG_URL;
	
	public static $widgets = array(
		'news' => 'News',
		'glyph' => 'Block',
		'image' => 'Image',
		'text' => 'Text',
	);
	
	public static $exclude_post_types = array(
		'attachment',
		'revision',
		'nav_menu_item',
		'custom_css',
		'customize_changeset',
		'grid', // it necessarily for this post type
	);

	/*
	main content widget
	own template files
	posts (N, autoload = False) maybe pagination
	*/
	
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
		add_action('admin_menu', array($this, 'my_menu_pages'));

        add_action('gl_edit_widget_action', array($this, 'edit_action_callback'));
        add_action('gl_save_widget_action', array($this, 'save_action_callback'));
	
		if($this->settings->get('use_the_content_filter')) {
			add_filter('the_content', array($this, 'the_content_filter'));
		}
		
		if($this->settings->get('use_shortcode')) {
			add_shortcode('gl-grid-tag', array($this, 'shortcode'));
		}
    }
    
    public function my_menu_pages() {
		$hook = add_submenu_page(null, 'Page Title', 'Page Title', 'administrator', 'gl-edit-widget', function() {});
		add_action('load-' . $hook, function() {
			wp_enqueue_style('hide-admin-bar', self::$PLUG_URL . '/assets/css/hide-admin-bar.css');
//
//			wp_enqueue_script('tiny_mce');
//			wp_enqueue_script( 'thickbox' );
//			wp_enqueue_style( 'thickbox' );
//			wp_enqueue_script('media-upload');
			
			do_action('wp_head');
			$this->layout->edit();
			do_action('wp_footer');
			exit;
		});
	}
    
    public function shortcode($atts) {
		$atts = shortcode_atts(array(
			'id' => FALSE
		), $atts);
	
		if(!empty($atts['id'])) {
			$composition = WidgetCompositionFacade::buildStructure($atts['id']);
			
			if($composition->isEmpty()) {
				return '';
			}
			
			return $composition->draw();
		}
		
		return "";
	}
    
    public function the_content_filter($content) {
		$composition = WidgetCompositionFacade::buildStructure(get_the_ID());
		    	
		if($composition->isEmpty()) {
			return $content;
		}
		
		//wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
		
    	return $composition->draw();
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
	
		if($post_types = $this->settings->get('meta_box')) {
			foreach($post_types as $post_type => $val) {
				add_meta_box("grid-{$post_type}-meta-box-id", "Grid {$post_type} Layout", array($this->layout, 'grid'), $post_type, 'normal', 'high');
			}
		}
    }

    public function add_settings_menu_page() {
		add_options_page('Grid Layout', 'Grid Layout', 'administrator', 'grid-layout', array($this->settings, 'page'));
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



