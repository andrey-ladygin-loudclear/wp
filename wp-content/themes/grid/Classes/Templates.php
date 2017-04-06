<?php

namespace GL\Classes;

class Templates {
	public $template_checksum;
	private $pattern;
	private $template_name;
	private $post;
	
	public function __construct($post_id) {
		$this->post = get_post($post_id);
		$this->pattern = $this->selectPatternForPostType();
		$file = $this->get_single_grid_path();
		$this->template_checksum = md5_file($file);
		$this->template_name = $this->get_file_name();
	}
	
	public function selectPatternForPostType() {
		switch($this->post->post_type) {
			case 'page': return 'page-{post-id}.php';
			case 'category': return 'category-{post-id}.php';
			case 'tag': return 'tag-{post-id}.php';
			default: return 'single-{post-type}-{slug}.php ';
		}
	}
	
	public function get_single_grid_path() {
		return plugin_dir_path(__FILE__) . '../single-grid.php';
	}
	
	public function get_file_name() {
		$filename = str_replace('{post-type}', $this->post->post_type, $this->pattern);
		$filename = str_replace('{post-id}', $this->post->ID, $filename);
		$filename = str_replace('{slug}', $this->post->post_name, $filename);
		return $filename;
	}
	
	public function get_template_path() {
		$theme_dir = get_template_directory();
		return $theme_dir . "/" . $this->template_name;
	}
		
	public function check_checkusm() {
		$checksum =  md5_file($this->get_template_path());
		return $checksum == $this->template_checksum;
	}
	
	public function template_exist() {
		return file_exists($this->get_template_path());
	}
	
	public function delete() {
		return unlink($this->get_template_path());
	}
	
	public function create() {
		return copy($this->get_single_grid_path(), $this->get_template_path());
	}
	
	// the same as create
	public function update() {
		return copy($this->get_single_grid_path(), $this->get_template_path());
	}
}