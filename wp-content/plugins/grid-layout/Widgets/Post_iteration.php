<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Helpers\ObjectHelper;
use GL\Widgets\System\Glyph;

class Post_iteration extends Glyph {
	
//	public $options = array(
//		'category__in' => array(),
//		'tag__in' => array(),
//		'post_parent' => '',
//		'author_name' => '',
//		'post_type' => 'post',
//		'post_status' => 'publish',
//		'order' => 'DESC',
//		'orderby' => 'modified',
//	);
	
	public $schema = array(
		'posts_per_page' => array(
			'label' => "Post Per Page",
			'type' => 'int',
			'default' => '5',
		),
		'offset'           => array(
			'label' => "Offset",
			'type' => 'int',
			'default' => '0'
		),
		//'category'         => '',
		'category_name'     => array(
			'label' => "Category Name",
			'type' => 'text',
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
				'date' => 'date',
				'modified' => 'modified',
			)
		),
//		'include'          => '',
//		'exclude'          => '',
//		'meta_key'         => '',
//		'meta_value'       => '',
		'post_type'        => array(
			'label' => 'Post Type',
			'type' => 'select',
			'default' => 'post',
		),
//		'post_mime_type'   => '',
//		'post_parent'      => '',
//		'author'	   => '',
//		'author_name'	   => '',
		'post_status' => array(
			'label' => 'Post Status',
			'type' => 'select',
			'default' => 'publish',
		),
		//'suppress_filters' => true,
	);
	
	public function __construct()
	{
		parent::__construct();
		
//		$this->schema['category__in']['values'] = ObjectHelper::create(get_categories())->lists('term_id', 'name');
//		$this->schema['tag__in']['values'] = ObjectHelper::create(get_tags())->lists('term_id', 'name');
		$this->schema['post_status']['values'] = get_post_statuses();
		$this->schema['post_type']['values'] = get_post_types('', 'names');
	}
	
	public function draw() {
		$posts = get_posts($this->options);
		View::load('Templates/Frontend/post_iteration', array(
			'widget' => $this,
			'posts' => $posts
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