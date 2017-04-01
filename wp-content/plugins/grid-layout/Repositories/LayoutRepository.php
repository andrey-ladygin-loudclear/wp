<?php

namespace GL\Repositories;

use GL\Classes\DB;
use GL\Factories\WidgetFactory;
use GL\Interfaces\LayoutRepositoryInterface;

Class LayoutRepository extends DB implements LayoutRepositoryInterface {
	
	protected static $table = 'gl_grid';
	private static $fields = array(
		'parent_id' => 0,
		'parent_type' => 'page',
		'widget_id' => 0,
		'widget_name' => '',
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
	
	public function find($widget) {
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
		return parent::insert($widget);
	}
	
	public function getHierarchy($parent_id, $parent_type = 'page') {
		$sql = "SELECT *, widget_name as name
            FROM {$this->getTable()} wgg
            LEFT JOIN wp_gl_widget ON wp_gl_widget.id = wgg.widget_id 
            WHERE wgg.parent_id = {$parent_id} AND wgg.parent_type = '{$parent_type}'
            ORDER BY row, col
        ;";
		
		return $this->query($sql);
	}
	
	public function getGrid($post_id, $parent_type = 'page') {
		$layoutTable = $this->getTable();

		$sql = "SELECT *, widget_name as name FROM {$layoutTable} wgg
			LEFT JOIN wp_gl_widget ON wp_gl_widget.id = wgg.widget_id 
			WHERE parent_id = {$post_id} AND parent_type = '{$parent_type}';";
        
		$widgets = array();
		
		foreach($this->query($sql) as $row) {
		    $widgets[] = WidgetFactory::factory($row);
        }
        
		return $widgets;
	}
}