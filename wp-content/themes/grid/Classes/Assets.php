<?php

namespace GL\Classes;

Class Assets {

    private static $_js = array();
    private static $_css = array();
	
	public static function getFileUrl($file) {
		if(!file_exists($file)) {
			return \GL_Grid_Layout::$URL . $file;
		}
		
		return $file;
	}

	public static function addPack($files) {
		foreach($files as $file) {
			self::add($file);
		}
	}
	
    public static function add($file) {
    	if(is_string($file)) {
			$file = array(
				'name' => md5($file),
				'src' => $file,
			);
		}
		
		if(stristr($file['src'], '://') === FALSE) {
			$file['src'] = self::getFileUrl($file['src']);
		}
		
        if(stristr($file['src'], '.css')) {
            self::$_css[] = $file;
            return;
        }

        self::$_js[] = $file;
    }

    public static function getJs() {
        return self::$_js;
    }

    public static function getCss() {
        return self::$_css;
    }

    public static function addBootstrap() {
		self::$_css[] = array('name' => 'gl-bootstrap-style', 'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
		self::$_css[] = array('name' => 'gl-bootstrap-theme-style', 'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css');
		self::$_js[] = array('name' => 'gl-bootstrapcdn-script', 'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
		self::$_js[] = array('name' => 'gl-bootstrap-wysiwyg-script', 'src' => self::getFileUrl('/assets/js/bootstrap-wysiwyg.js'));
    }
    
    public static function addGridister() {
		self::$_css[] = array('name' => 'gl-gridister-style', 'src' => self::getFileUrl('/assets/css/gridstack.css'));
		self::$_js[] = array('name' => 'gl-underscore-script', 'src' => 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js');
		self::$_js[] = array('name' => 'gl-gridister-script', 'src' => self::getFileUrl('/assets/js/gridstack.js'));
		self::$_js[] = array('name' => 'gl-gridister-jqueryUI-script', 'src' => self::getFileUrl('/assets/js/gridstack.jQueryUI.js'));
	}
	
	public static function addJquery() {
		self::$_js[] = array('name' => 'jquery', 'src' => 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');
	}
	
	public static function addJqueryUI() {
		self::$_js[] = array('name' => 'gl-jquery-script', 'src' => 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.js');
	}
	public static function addTinyMCE() {
		self::$_js[] = array('name' => 'gl-tiny-mce-script', 'src' => self::getFileUrl('/assets/plugins/tinymce/tinymce.min.js'));
	}

    public static function addLayout() {
		self::$_css[] = array('name' => 'gl-layout-style', 'src' => self::getFileUrl('/assets/css/styles.css'));
		self::$_js[] = array('name' => 'gl-layout-script', 'src' => self::getFileUrl('/assets/js/layout.js'));
		self::$_js[] = array('name' => 'gl-main-script', 'src' => self::getFileUrl('/assets/js/main.js'));
    }
    
    public static function addMainScript() {
		self::$_js[] = array('name' => 'gl-main-script', 'src' => self::getFileUrl('/assets/js/main.js'));
	}
    
    public static function addWidgetView() {
		self::$_css[] = array('name' => 'gl-widget-styles', 'src' => self::getFileUrl('/assets/css/widgets.css'));
		self::$_js[] = array('name' => 'gl-view-script', 'src' => self::getFileUrl('/assets/js/view.js'));
	}
    
    public static function addMCEEditorStyles() {
		add_editor_style( self::getFileUrl('/assets/css/mce-editor-styles.css') );
	}
    
    public static function addDefaults() {
		self::addBootstrap();
    	self::addJqueryUI();
    	self::addGridister();
		//self::addTinyMCE();
    	self::addLayout();
	}
	
	public static function enqueue() {
		self::enqueue_script();
		self::enqueue_style();
	}
	
	public static function enqueue_script() {
		foreach(self::getJs() as $js) {
			wp_enqueue_script($js['name'], $js['src']);
		}
	}
	
	public static function enqueue_style() {
		foreach(self::getCss() as $css) {
			wp_enqueue_style($css['name'], $css['src']);
		}
	}
}

/*
        wp_enqueue_style('gl-layout-style', plugins_url('/assets/css/styles.css', __FILE__));
        wp_enqueue_style('gl-bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
        wp_enqueue_style('gl-gridister-style', plugins_url('/assets/css/gridstack.css', __FILE__));
        wp_enqueue_style('gl-bootstrap-theme-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css');

        wp_enqueue_script('gl-bootstrapcdn-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
        wp_enqueue_script('gl-jquery-script', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.js');
        wp_enqueue_script('gl-underscore-script', 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js');
        wp_enqueue_script('gl-gridister-script', plugins_url('/assets/js/gridstack.js', __FILE__));
        wp_enqueue_script('gl-gridister-jqueryUI-script', plugins_url('/assets/js/gridstack.jQueryUI.js', __FILE__));
        wp_enqueue_script('gl-layout-script', plugins_url('/assets/js/layout.js', __FILE__));
*/