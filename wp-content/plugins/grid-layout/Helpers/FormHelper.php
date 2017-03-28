<?php
namespace GL\Helpers;

use GL\Classes\View;

class FormHelper {
		
	public static function showOptionField($name, $value, $schema) {
		$schema = !empty($schema[$name]) ? $schema[$name] : '';
		self::showField("options[$name]", self::nameToLabel($name), $value);
	}
	
	public static function showField($name, $label, $value) {
		if(is_string($value)) {
			self::showInput($name, $label, $value);
		} else if(is_bool($value)) {
			self::showBool($name, $label, $value);
		}
	}
	
	public static function showInput($name, $label, $value) {
		View::input($name, $label, $value);
	}
	
	public static function showBool($name, $label, $value) {
		View::select($name, $label, array('1' => 'Yes','0' => 'No'), $value);
	}
	
	public static function nameToLabel($name) {
		return ucfirst(str_replace('_', '', $name));
	}
}
