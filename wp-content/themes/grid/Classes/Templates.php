<?php

namespace GL\Classes;

class Templates {
	
    protected static $templates = array(
        'page' => 'For all pages (page)',
        'single' => 'For single page (single)',
        'category' => 'For category page (category)',
        'tag' => 'For tag page (tag)',
        'taxonomy' => 'For taxonomy page (taxonomy)',
        'archive' => 'For archive page (archive)',
        'footer' => 'For footer',
    );
    
    public static function getTemplates() {
        $templates = self::$templates;
        
        foreach(self::getPostTypes() as $post_type) {
            $templates[$post_type] = "For {$post_type}";
        }
        
        return $templates;
    }
    
    public static function getPostTypes() {
        $postTypes = array();
        
        foreach(get_post_types('', 'names') as $post_type) {
            if(empty(self::$templates[$post_type]) && !in_array($post_type, Config::$excluded_post_types)) {
                $postTypes[] = $post_type;
            }
        }
        
        return $postTypes;
    }
    
    public function before() {
        Assets::addDefaults();
        Assets::enqueue();
    }
    
	public function page() {
	    $this->before();
		View::load('Templates/Backend/Settings/templates', array('post_type' => 'page'));
	}
    
	public function single() {
        $this->before();
		View::load('Templates/Backend/Settings/templates', array('post_type' => 'single'));
	}
    
	public function category() {
        $this->before();
		View::load('Templates/Backend/Settings/templates', array('post_type' => 'category'));
	}
    
	public function tag() {
        $this->before();
		View::load('Templates/Backend/Settings/templates', array('post_type' => 'tag'));
	}
    
	public function taxonomy() {
        $this->before();
		View::load('Templates/Backend/Settings/templates', array('post_type' => 'taxonomy'));
	}
    
	public function archive() {
        $this->before();
		View::load('Templates/Backend/Settings/templates', array('post_type' => 'archive'));
	}
    
	public function footer() {
        $this->before();
		View::load('Templates/Backend/Settings/templates', array('post_type' => 'footer'));
	}
	
}