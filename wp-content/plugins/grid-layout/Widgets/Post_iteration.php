<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Helpers\ObjectHelper;
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
    
    public $schema = [
        'category__in' => array(
            'label' => 'In Categories',
            'size' => 'form-group-sm col-xs-6',
            'type' => 'multiselect',
        ),
        'tag__in' => array(
            'label' => 'In Tags',
            'size' => 'form-group-sm col-xs-6',
            'type' => 'multiselect',
        ),
        'post_parent' => array(
            'label' => 'Parent Post',
            'type' => 'select',
        ),
        'author_name' => 'text',
        'posts_per_page' => array(
            'label' => 'Posts Per Page',
            'type' => 'int',
        ),
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
	
	public function __construct()
	{
		parent::__construct();
		
		$this->schema['category__in']['values'] = ObjectHelper::create(get_categories())->lists('term_id', 'name');
		$this->schema['tag__in']['values'] = ObjectHelper::create(get_tags())->lists('term_id', 'name');
        $this->schema['post_status']['values'] = get_post_statuses();
        $this->schema['post_type']['values'] = get_post_types('', 'names');
		//$this->schema['post_parent']['values'] = ObjectHelper::create(get_tags())->lists('term_id', 'name');
	}
	
	public function draw($before = '', $after = '', $showMainContainer = TRUE) {
        global $wp_query;
        $wp_query = new \WP_Query($this->options);
        View::load('Templates/Frontend/post_iteration', array(
            'widget' => $this,
            //'query' => $query,
            'before' => $before,
            'after' => $after,
            'showMainContainer' => $showMainContainer,
        ));
//        wp_reset_postdata();
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