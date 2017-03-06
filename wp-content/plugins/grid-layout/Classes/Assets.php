<?php

namespace GL;

Class Assets {

    private $_js = array();
    private $_css = array();
	
	public static function getFileUrl($file) {
		if(!file_exists($file)) {
			return \GL_Grid_Layout::$PLUG_URL . $file;
		}
		
		return $file;
	}

    public function add($file) {
        if(stristr($file, '.css')) {
            $this->_css[] = $file;
            return;
        }

        $this->_js[] = $file;
    }

    public function getJs() {
        return $this->_js;
    }

    public function getCss() {
        return $this->_css;
    }

    public function addBootstrap() {
		$this->_css[] = array('name' => 'gl-bootstrap-style', 'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
		$this->_css[] = array('name' => 'gl-bootstrap-theme-style', 'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css');
		$this->_js[] = array('name' => 'gl-bootstrapcdn-script', 'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
		$this->_js[] = array('name' => 'gl-bootstrap-wysiwyg-script', 'src' => self::getFileUrl('/assets/js/bootstrap-wysiwyg.js'));
    }
    
    public function addGridister() {
		$this->_css[] = array('name' => 'gl-gridister-style', 'src' => self::getFileUrl('/assets/css/gridstack.css'));
		$this->_js[] = array('name' => 'gl-underscore-script', 'src' => 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js');
		$this->_js[] = array('name' => 'gl-gridister-script', 'src' => self::getFileUrl('/assets/js/gridstack.js'));
		$this->_js[] = array('name' => 'gl-gridister-jqueryUI-script', 'src' => self::getFileUrl('/assets/js/gridstack.jQueryUI.js'));
	}
	
	public function addJquery() {
		$this->_js[] = array('name' => 'jquery', 'src' => 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');
	}
	
	public function addJqueryUI() {
		$this->_js[] = array('name' => 'gl-jquery-script', 'src' => 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.js');
	}
	public function addTinyMCE() {
		$this->_js[] = array('name' => 'gl-tiny-mce-script', 'src' => self::getFileUrl('/assets/plugins/tinymce/tinymce.min.js'));
	}

    public function addLayout() {
		$this->_css[] = array('name' => 'gl-layout-style', 'src' => self::getFileUrl('/assets/css/styles.css'));
		$this->_js[] = array('name' => 'gl-layout-script', 'src' => self::getFileUrl('/assets/js/layout.js'));

    }
    
    public function addMainScript() {
		$this->_js[] = array('name' => 'gl-main-script', 'src' => self::getFileUrl('/assets/js/main.js'));
	}
    
    public function addDefaults() {
		$this->addBootstrap();
    	$this->addJqueryUI();
    	$this->addGridister();
    	$this->addLayout();
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