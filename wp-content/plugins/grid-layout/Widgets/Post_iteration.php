<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Glyph;

class Post_iteration extends Glyph {
	
	public $options = array(
		'category__in' => array(),
		'tag__in' => array(),
		'post_parent' => '',
		'author_name' => '',
		'post_type' => 'post',
		'post_status' => 'publish',
		'order' => 'DESC',
		'orderby' => 'modified',
	);
	
	public function draw() {
		$query = new \WP_Query(array('post_type' => 'post'));
		View::load('Templates/Frontend/post_iteration', array(
			'widget' => $this,
			'query' => $query
		));
		wp_reset_postdata();
	}
	
	public function draw_old() {
		//get_pages();
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				View::load("Templates/Frontend/glyph", array('widget' => $this));
			}
		}
		//https://wp-kama.ru/function/the_post
	}
}