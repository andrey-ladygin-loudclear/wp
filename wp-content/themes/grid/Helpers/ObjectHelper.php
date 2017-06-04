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
	
	public function lists($value, $name = NULL) {
		$result = array();
		if($name) {
			foreach($this->objects as $object) {
				$result[ $object->$value ] = $object->$name;
			}
		} else {
			foreach($this->objects as $object) {
				$result[] = $object->$value;
			}
		}
		
		return $result;
	}

	public static function wp_fields_convert_to_options($data) {
	    if(empty($data['options'])) {
            $data['options'] = array();
        }

        if(is_array($data)) {
            foreach($data as $key => $value) {
                if(strpos($key, 'widget-') !== false && is_array($value)) {
                    $data['options'] = array_merge($data['options'], $value);
                }
            }
        }

        return $data;
    }
	
	public static function clear($item) {
		if(is_array($item)) {
			foreach ($item as &$v) {
				$v = self::clear($v);
			}
		} else {
			$item = stripcslashes($item);
		}
		
		return $item;
	}
}
