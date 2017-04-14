<?php

namespace GL\Classes;

class Templates {
	
    public static $templates = array(
        'page' => 'For all pages (page)',
        'single' => 'For single page (single)',
        'category' => 'For category page (category)',
        'tag' => 'For tag page (tag)',
        'taxonomy' => 'For taxonomy page (taxonomy)',
        'archive' => 'For archive page (archive)',
        'footer' => 'For footer',
    );
    
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