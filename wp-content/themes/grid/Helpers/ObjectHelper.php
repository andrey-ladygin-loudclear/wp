<?php
namespace GL\Helpers;

class ObjectHelper {
	
	private $objects;
	
	public static function create($objects) {
		return new ObjectHelper($objects);
	}
	
	public function __construct($objects) {
		$this->objects = $objects;
	}
	
	public function lists($value, $name) {
		$result = array();
		foreach($this->objects as $object) {
			$result[ $object->$value ] = $object->$name;
		}
		
		return $result;
	}
}
