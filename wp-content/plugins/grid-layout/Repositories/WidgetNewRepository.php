<?php

namespace GL\Repositories;

use GL\Classes\DB;
use GL\Interfaces\WidgetRepositoryInterface;
use JsonSerializable;

Class WidgetNewRepository extends DB {
	
	protected static $table = 'gl_widget';
	protected $id;
	protected $fillable = array(
		'id',
		'alias',
		'options',
		'data',
		'args',
		'style',
		'full_width',
	);
	
	public $full_width;
	public $options;
	
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
		
		$sql = "SELECT *, widget_name as name FROM {$layout_table} wgg
			LEFT JOIN $widget_table wt ON wt.id = wgg.widget_id
			WHERE wt.id = {$widget_id};";
		
		$res = self::query($sql);
		return $this->fill($res[0]);
	}
	
	public function save() {
		$data = array();
		
		foreach($this->fillable as $field) {
			$data[$field] = is_array($this->{$field}) ? json_encode($this->{$field}) : $this->{$field};
		}
		
		unset($data['id']);
		$this->update($data, array('id' => $this->id));
	}
	
	public function fill(array $attributes) {
		foreach($this->fillable as $field) {
			if(!empty($attributes[$field])) {
				if(is_string($attributes[$field]) && $json_decode = json_decode($attributes[$field])) {
					$this->{$field} = is_object($json_decode) ? (array) $json_decode : $json_decode;
				} else {
					$this->{$field} = $attributes[$field];
				}
			}
		}
		
		return $this;
	}
}