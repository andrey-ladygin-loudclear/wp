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
        View::load('Templates/Components/form/input', array('name' => $name, 'label' => $label, 'value' => $value));
	}
	
	public static function showBool($name, $label, $value) {
        View::load('Templates/Components/form/select', array('name' => $name, 'label' => $label, 'options' => array('1' => 'Yes','0' => 'No'), 'value' => $value));
	}
	
	public static function nameToLabel($name) {
		return ucfirst(str_replace('_', '', $name));
	}
	
	public static function showSchemaInput(SchemaHelper $schema) {
	    switch($schema->fieldType) {
            case 'bool': return View::load('Templates/Components/schema/select', array('schema' => $schema));
            case 'int': return View::load('Templates/Components/schema/input', array('schema' => $schema));
            case 'select': return View::load('Templates/Components/schema/select', array('schema' => $schema));
            case 'multiselect': return View::load('Templates/Components/schema/multipleSelect', array('schema' => $schema));
            case 'textarea': return View::load('Templates/Components/schema/textarea', array('schema' => $schema));
            case 'image': return View::load('Templates/Components/schema/image', array('schema' => $schema));
            default: View::load('Templates/Components/schema/input', array('schema' => $schema));
        }
    }
}
