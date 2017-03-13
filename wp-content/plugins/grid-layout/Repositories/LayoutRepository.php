<?php

namespace GL;
include dirname(__FILE__).'../Repositories/LayoutRepository.php';

Class LayoutRepository extends DB implements LayoutRepositoryInterface {
	
	protected $table = 'gl_grid';
	private static $fields = array(
		'parent_id' => 0,
		'parent_type' => 'page',
		'widget_id' => 0,
		'widget_name' => '',
		'full_widget' => 0,
		'size_x' => 0,
		'size_y' => 0,
		'row' => 0,
		'col' => 0
	);
	
	public function removeAll($post_id, $parent_type) {
		$this->delete(array('parent_id' => $post_id, 'parent_type' => $parent_type));
	}
	
	public function save($json, $post_id, $parent_type = 'page') {
		$post_id = (int) $post_id;
		
		$this->removeAll($post_id, $parent_type);
		
		if(!empty($json)) {
			foreach($json as $widget) {
				$widget = (array) $widget;
				$widget['parent_id'] = $post_id;
				$widget['parent_type'] = $parent_type;
				$this->add($widget);
			}
		}
	}
	
	public function find($widget)
	{
		return $this->get(array(
			'parent_id' => $widget['parent_id'],
			'parent_type' => $widget['parent_type'],
			'widget_id' => $widget['widget_id'],
			'widget_name' => $widget['widget_name'],
		));
	}
	
	public function add($widget)
	{
		$widget = array_merge(self::$fields, $widget);
		return $this->insert($widget);
	}
	
	public function getHierarchy($parent_id, $parent_type = 'page') {
		$sql = "SELECT wgg.*, wp_gl_widget_glyph.*, wp_gl_widget_image.*, wp_gl_widget_text.*
            FROM {$this->table} wgg
            LEFT JOIN wp_gl_widget_glyph ON wp_gl_widget_glyph.id = wgg.widget_id AND wgg.widget_name = 'glyph'
            LEFT JOIN wp_gl_widget_image ON wp_gl_widget_image.id = wgg.widget_id AND wgg.widget_name = 'image'
            LEFT JOIN wp_gl_widget_text ON wp_gl_widget_text.id = wgg.widget_id AND wgg.widget_name = 'text'
            WHERE wgg.parent_id = {$parent_id} AND wgg.parent_type = '{$parent_type}'
            ORDER BY row, col
        ;";
		
		return $this->query($sql);
	}
	
	
	
	public function getGrid($post_id, $parent_type = 'page') {
		$sql = "SELECT * FROM wp_gl_grid wgg
            LEFT JOIN wp_gl_widget_glyph ON wp_gl_widget_glyph.id = wgg.widget_id AND wgg.widget_name = 'glyph'
            LEFT JOIN wp_gl_widget_image ON wp_gl_widget_image.id = wgg.widget_id AND wgg.widget_name = 'image'
            LEFT JOIN wp_gl_widget_text ON wp_gl_widget_text.id = wgg.widget_id AND wgg.widget_name = 'text'
			WHERE parent_id = {$post_id} AND parent_type = '{$parent_type}';";
		
		return $this->query($sql);
	}
}