<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Helpers\ObjectHelper;
use GL\Widgets\System\Glyph;

class Wp_query extends Glyph {
	
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
	
	public $schema = [
		'category__in' => array(
			'label' => 'In Categories',
			'type' => 'select',
		),
		'tag__in' => array(
			'label' => 'In Tags',
			'type' => 'select',
		),
		'post_parent' => array(
			'label' => 'Parent Post',
			'type' => 'select',
		),
		'author_name' => 'text',
		'post_type' => array(
			'label' => 'Post Type',
			'type' => 'select',
		),
		'post_status' => array(
			'label' => 'Post Status',
			'type' => 'select',
		),
		'order' => array(
			'label' => 'Order',
			'type' => 'select',
			'values' => array('ASC' => 'ASC', 'DESC' => 'DESC')
		),
		'orderby' => array(
			'label' => 'Order By',
			'type' => 'select',
			'values' => array(
				'modified' => 'modified'
			)
		),
	];
	
	//http://stackoverflow.com/questions/24838864/how-do-i-get-pagination-to-work-for-get-posts-in-wordpress
	public function __construct()
	{
		parent::__construct();
		
		$this->schema['category__in']['values'] = ObjectHelper::create(get_categories())->lists('term_id', 'name');
		$this->schema['tag__in']['values'] = ObjectHelper::create(get_tags())->lists('term_id', 'name');
	}
	
	public function draw() {
		$query = new \WP_Query(array('post_type' => 'post'));
		View::load('Templates/Frontend/post_iteration', array(
			'widget' => $this,
			'query' => $query
		));
		wp_reset_postdata();
	}
	
	public function draw_old() {
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				View::load("Templates/Frontend/glyph", array('widget' => $this));
			}
		}
		//https://wp-kama.ru/function/the_post
	}
}