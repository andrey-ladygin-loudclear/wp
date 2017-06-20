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
    
    public function __call($name, $arguments) {
        Assets::addDefaults();
		Assets::enqueue();
		View::load('Templates/Backend/Settings/templates', array('post_type' => $name));
	}
}