<?php

namespace GL\Repositories;

use GL\Classes\DB;
use GL\Interfaces\WidgetRepositoryInterface;
use JsonSerializable;

Class WidgetNewRepository extends DB {
	
	protected static $table = 'gl_widget';
	protected $fillable = array(
		'id',
		'parent_id',
		'full_widget',
		'alias',
		'options',
		'data',
		'args',
		'style',
		'classes'
	);
	protected $id;
	
	public static function add($data = array()) {
		$data = array_merge(array('id' => NULL), (array) $data);
		$id = parent::insert($data);
		return $id;
	}
	
	public function remove() {
		self::delete(array('id' => $this->id));
	}
	
	public function find($widget_id) {
		$widget_table = self::getTable();
		$layout_table = LayoutRepository::getTable();
		
		$sql = "SELECT * FROM {$layout_table} wgg
			LEFT JOIN $widget_table wt ON wt.id = wgg.widget_id
			WHERE wt.id = {$widget_id};";
		
		$res = self::query($sql);
		return $this->fill($res[0]);
	}
	
	public function save() {
		$data = array();
		
		foreach($this->fillable as $field) {
			$data[$field] = $this->{$field};
		}
		
		$this->update($data, array('id' => $this->id));
	}
	
	public function fill(array $attributes) {
		foreach($this->fillable as $field) {
			if(!empty($attributes[$field])) {
				if($json_decode = json_decode($attributes[$field])) {
					$this->{$field} = $json_decode;
				} else {
					$this->{$field} = $attributes[$field];
				}
			}
		}
		
		return $this;
	}
}