<?php

use GL\Classes\Actions;
use GL\Classes\Assets;
use GL\Classes\Config;
use GL\Classes\Customize;
use GL\Classes\DB;
use GL\Classes\Layout;
use GL\Classes\Settings;
use GL\Classes\Styles;
use GL\Classes\Templates;
use GL\Facades\WidgetCompositionFacade;

class GL_Grid_Layout {

	public function __construct() {

		// if __autoload is active, put it on the spl_autoload stack
		if (is_array(spl_autoload_functions()) && in_array('__autoload', spl_autoload_functions())) {
			spl_autoload_register('__autoload');
		}

		// Add the autoloader
		spl_autoload_register(array($this, 'autoloader'));

		$this->layout = new Layout();
		$this->styles = new Styles();
		$this->assets = new Assets();
		$this->settings = new Settings();
		$this->actions = new Actions();
		$this->templates = new Templates();
		$this->customize = new Customize();

		$this->assets->addJquery();

		add_action('init', array($this, 'create_grid_post_type'));
		add_action('add_meta_boxes', array($this, 'add_meta_box'));

		add_action('customize_register', array($this->customize, 'add_options'));

		add_action('wp_ajax_gl_ajax_add_widget', array($this->layout, 'add_widget'));
		add_action('wp_ajax_gl_ajax_get_widget_preview', array($this->layout, 'get_widget_preview'));
		add_action('wp_ajax_gl_ajax_delete_widget', array($this->layout, 'delete_widget'));
		add_action('wp_ajax_gl_ajax_import_widget', array($this->layout, 'import_widget'));
		add_action('wp_ajax_gl_ajax_save_layout', array($this->layout, 'save_layout'));
		add_action('wp_ajax_gl_ajax_change_styles', array($this->styles, 'change'));
		add_action('wp_ajax_gl_ajax_save_styles', array($this->styles, 'save'));

		add_action('gl_edit_widget_action', array($this->layout, 'edit'));
		add_action('gl_save_widget_action', array($this->layout, 'save_widget'));
		add_action('gl_delete_template_action', array($this->actions, 'delete_template'));
		add_action('gl_update_template_action', array($this->actions, 'update_template'));
		add_action('gl_create_template_action', array($this->actions, 'create_template'));

		add_action('admin_menu', array($this, 'add_settings_menu_page'));
		add_action('admin_menu', array($this, 'add_templates_menu_page'));
		add_action('admin_menu', array($this, 'empty_wp_page'));


		function register_menus() {
			register_nav_menu('header-menu', __( 'Header Menu' ));
			register_nav_menu('footer-menu', __( 'Footer Menu' ));
		}

		add_action('init', 'register_menus');
		add_theme_support('post-thumbnails');
		add_action('after_setup_theme', array(new DB(), 'install'));

		//add_image_size('posts-thumbnail-size', 230, 230, TRUE);

		add_filter('mce_buttons', array($this->customize, 'mce_buttons'));
		add_filter('tiny_mce_before_init', array($this->customize, 'mce_fonts'));

		add_action( 'current_screen', array($this->assets, 'addMCEEditorStyles') );
	}

	public function empty_wp_page() {
		add_submenu_page(null, 'Page Title', 'Page Title', 'administrator', 'gl-edit-widget-page', function() {
			wp_enqueue_media();
			$this->layout->edit();
		});

		add_submenu_page(null, 'Page Title', 'Page Title', 'administrator', 'gl-view-widget', function() {
			wp_enqueue_media();
			$this->styles->view();
		});

		$hook_edit = add_submenu_page(null, 'Page Title', 'Page Title', 'administrator', 'gl-edit-widget', function() {});

		add_action('load-' . $hook_edit, function() {
			wp_enqueue_style('hide-admin-bar', get_template_directory_uri() . '/assets/css/hide-admin-bar.css');
			wp_enqueue_media();
			wp_enqueue_script('tiny_mce');
			$this->layout->edit();
			do_action("admin_footer");
			do_action("admin_print_scripts");
			do_action("admin_print_footer_scripts");
			do_action("admin_print_styles");
			exit;
		});
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
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array('slug' => 'grid', 'with_front' => true ),
				'has_archive' => true,
			)
		);
		remove_post_type_support($post_type, 'editor');
	}

	public function add_meta_box() {
		add_meta_box('grid-meta-box-id', 'Grid Layout', array($this->layout, 'grid'), 'grid', 'normal', 'high');

		//		if($post_types = $this->settings->get('templates')) {
		//			foreach($post_types as $post_type => $val) {
		//				add_meta_box("grid-{$post_type}-meta-box-id", "Grid {$post_type} Layout", array($this->layout, 'grid'), $post_type, 'normal', 'high');
		//			}
		//		}

		foreach(Settings::getMetaBoxPostTypes() as $postType) {
			add_meta_box("grid-{$postType}-meta-box-id", "Grid {$postType} Layout", array($this->layout, 'grid'), $postType, 'normal', 'high');
		}
	}

	public function add_templates_menu_page() {
		add_menu_page('Grid Templates', 'Grid Templates', 'administrator', 'grid-templates', array($this->settings, 'page'));

		foreach(Templates::getTemplates() as $template => $name) {
			$slug = "grid-layout-template-{$template}";
			add_submenu_page('grid-templates', $name, ucfirst($template), 'administrator', $slug, array($this->templates, $template));
		}
	}
	public function add_settings_menu_page() {
		add_options_page('Grid Layout', 'Grid Layout', 'administrator', 'grid-layout', array($this->settings, 'page'));
		add_submenu_page('edit.php?post_type=grid', 'Grid Layout', 'Settings', 'administrator', 'grid-layout-options', array($this->settings, 'page'));
	}

}

$gl_grid_layout = new GL_Grid_Layout();
$gl_grid_layout->actions->check_actions();



