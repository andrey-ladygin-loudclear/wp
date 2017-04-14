<?php

namespace GL\Classes;

use GL\Factories\WidgetFactory;

Class Config {
	
	public static $widgets = array(
		'latest_posts' => 'Latest posts',
		'blackquote' => 'Blackquote',
		'comments' => 'Comments',
	);
	
	public static $builder = array(
		'news' => 'News',
		'block' => 'Block',
		'gallery' => 'gallery',
		'text' => 'Text',
		'carousel' => 'Carousel',
		'background_image' => 'Background Image',
		'wp_query' => 'WP Query',
		'paralax' => 'Paralax',
	);
	
	public static $widget_components = array(
		'post_author' => 'Post Author',
		'post_content' => 'Post Content',
		'post_date' => 'Post Date',
		'post_permalink' => 'Post Permalink',
		'post_tags' => 'Post Tags',
		'post_thumbnail' => 'Post Thumbnail',
		'post_time' => 'Post Time',
		'post_title' => 'Post Title',
		'Post_pagination' => 'Post Pagination',
		'post_iteration' => 'Post Iteration',
		'sidebar' => 'Sidebar',
	);
	
	public static $exclude_post_types = array(
		'attachment',
		'revision',
		'nav_menu_item',
		'custom_css',
		'customize_changeset',
		'grid', // it necessarily for this post type
	);
	
	public static function get($name) {
		return WidgetFactory::getObject($name);
	}
}