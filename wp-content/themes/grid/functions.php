<?php

use GL\Classes\Actions;
use GL\Classes\Assets;
use GL\Classes\Config;
use GL\Classes\Customize;
use GL\Classes\Layout;
use GL\Classes\Settings;
use GL\Classes\Styles;
use GL\Classes\Templates;
use GL\Facades\WidgetCompositionFacade;

class GL_Grid_Layout {
	CONST DEBUG = FALSE;
	
	public static $DIR;
	public static $URL;
	
	public static $widgets = array(
		'latest_posts' => 'Latest posts',
		'blackquote' => 'Blackquote',
		'comments' => 'Comments',
	);
	
	public static $builder = array(
		'news' => 'News',
		'block' => 'Block',
		'gallery' => 'gallery',
		'text' => 'Text',
		'carousel' => 'Carousel',
		'background_image' => 'Background Image',
		'wp_query' => 'WP Query',
		'paralax' => 'Paralax',
	);
	
	public static $widget_components = array(
		'post_author' => 'Post Author',
		'post_content' => 'Post Content',
		'post_date' => 'Post Date',
		'post_permalink' => 'Post Permalink',
		'post_tags' => 'Post Tags',
		'post_thumbnail' => 'Post Thumbnail',
		'post_time' => 'Post Time',
		'post_title' => 'Post Title',
		'Post_pagination' => 'Post Pagination',
		'post_iteration' => 'Post Iteration',
		'sidebar' => 'Sidebar',
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
	 * Block widget add padding border etc
	 * and create breadcrumbs widget
	 * https://colorlib.com/shapely/about/page-image-alignment/
	 *
	 * try to draw on paper user actions scheme
	 * create facade to call other widgets
	 *
	 * https://colorlib.com/shapely/
	 *
	 * https://www.competethemes.com/tracks-live-demo/
	 * https://wordpress.org/themes/flat/
	 * https://colorlib.com/activello/
	 *
	 *
	 * WHAT IS .wp-pointer-content h3
	 *
	добавить тип темплейта в таблицу
	сделать возможность доабвлять темплейт не для каждой страницы а для группы (посты, страницы, архив)
	
	add bredcrumbs - http://www.andersnoren.se/themes/hemingway/
	
	https://themeisle.com/demo/?theme=Zerif+Lite&ref=5257
	 
	 
	add templates to settings
	add padding and margin to carousel
	 
	 
	add images functionality to own View Component
	alias to each widget
	LINK or BUTTON widget
	COMMENT widget
	PAGINATION widget
	GOOGLE MAP widget
	part widget content (first 100 symbols)
	posts (N, autoload = False) maybe pagination
	trt to create own widgegt https://codex.wordpress.org/Widgets_API
	
	layout JS can add widget to another widget by drag&drop
	https://github.com/troolee/gridstack.js/blob/master/doc/README.md
	
	
	ORANGE bottom http://demo.webulous.in/flaton/
	RED bottom http://blog.strikebowling.com.au/ (http://backgrounds.mysitemyway.com/free-wood-tileable-twitter-background/)
	
	http://themes.kadencethemes.com/virtue/
	
	WP STYLE THEME PAGE what options are there?
	
	
	single-page
	
	
	*/
	
	public function __construct() {
		self::$URL = get_template_directory_uri() . '/';
		self::$DIR = get_template_directory() . '/';
		
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
		
		if($this->settings->get('use_the_content_filter')) {
			add_filter('the_content', array($this, 'the_content_filter'));
		}
		
		if($this->settings->get('use_shortcode')) {
			add_shortcode('gl-grid-tag', array($this, 'shortcode'));
		}
        
        add_theme_support( 'post-thumbnails' );
        
        //add_image_size('posts-thumbnail-size', 230, 230, TRUE);
		
		function my_mce_buttons( $buttons ) {
			$buttons[] = 'superscript';
			$buttons[] = 'subscript';
			$buttons[] = 'fontselect';

			return $buttons;
		}
		add_filter( 'mce_buttons', 'my_mce_buttons' );
		
		add_action( 'current_screen', array($this->assets, 'addMCEEditorStyles') );
		
		
//		function plugin_mce_addfont($mce_css) {
//			if (! empty($mce_css)) $mce_css .= ',';
//			$mce_css .= '",theme_advanced_fonts:"Custom Font=CustomFont,arial,helvetica,sans-serif';
//			return $mce_css;
//		}
//		add_filter('mce_css', 'plugin_mce_addfont');
		add_filter( 'tiny_mce_before_init', 'wpex_mce_google_fonts_array' );
		function wpex_mce_google_fonts_array( $initArray ) {
			//$initArray['font_formats'] = 'Lato=Lato;Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';
			$theme_advanced_fonts = 'Aclonica=Aclonica;';
			$theme_advanced_fonts .= 'Lato=Lato;';
			$theme_advanced_fonts .= 'Michroma=Michroma;';
			$theme_advanced_fonts .= 'Paytone One=Paytone One';
			
			$theme_advanced_fonts = '';
			
			foreach(Config::$fonts as $font => $name) {
				$theme_advanced_fonts .= "$name=$font;";
			}
			
			$initArray['font_formats'] = $theme_advanced_fonts;
			return $initArray;
		}
		
//		function my_format_TinyMCE( $in ) {
//			$in['remove_linebreaks'] = true;
//			$in['gecko_spellcheck'] = true;
//			$in['keep_styles'] = true;
//			$in['accessibility_focus'] = true;
//			$in['tabfocus_elements'] = 'major-publishing-actions';
//			$in['media_strict'] = true;
//			$in['paste_remove_styles'] = true;
//			$in['paste_remove_spans'] = true;
//			$in['paste_strip_class_attributes'] = 'none';
//			$in['paste_text_use_dialog'] = true;
//			$in['wpeditimage_disable_captions'] = true;
//			//$in['plugins'] = 'tabfocus,paste,media,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpfullscreen';
//			$in['plugins'] = 'tabfocus,paste,media,wordpress,wpeditimage,wpgallery,wplink,wpdialogs';
//			$in['content_css'] = get_template_directory_uri() . "/editor-style.css";
//			$in['wpautop'] = true;
//			$in['apply_source_formatting'] = true;
//			$in['block_formats'] = "Paragraph=p; Heading 3=h3; Heading 4=h4";
//			$in['toolbar1'] = 'bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,wp_fullscreen,wp_adv ';
//			$in['toolbar2'] = 'formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help ';
//			$in['toolbar3'] = '';
//			$in['toolbar4'] = '';
//			return $in;
//		}
//		add_filter( 'tiny_mce_before_init', 'my_format_TinyMCE' );
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
			wp_enqueue_style('hide-admin-bar', self::$URL . '/assets/css/hide-admin-bar.css');
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
	
	public function shortcode($atts) {
		$atts = shortcode_atts(array(
			'id' => FALSE
		), $atts);
		
		remove_shortcode('gl-grid-tag');
		
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
		
		remove_filter('the_content', array($this, 'the_content_filter'));
		
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
		
		add_action( 'pre_get_posts', function ( $q ) {
			
			if( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'grid' ) ) {
				
				$q->set( 'posts_per_page', 2 );
				
			}
			
		});
		
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
		
		if($post_types = $this->settings->get('meta_box')) {
			foreach($post_types as $post_type => $val) {
				add_meta_box("grid-{$post_type}-meta-box-id", "Grid {$post_type} Layout", array($this->layout, 'grid'), $post_type, 'normal', 'high');
			}
		}
	}
	
	public function add_templates_menu_page() {
		add_menu_page('Grid Templates', 'Grid Templates', 'administrator', 'grid-templates', array($this->templates, 'page'));
        
        foreach(Templates::$templates as $template => $name) {
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



