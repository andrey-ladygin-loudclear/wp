<?php
namespace GL\Helpers;

use GL\Classes\View;

class SchemaHelper {
    
    public $name;
    public $label;
    public $value;
    public $fieldType;
    public $placeholder;
    public $availableValues = array();
    public $size = 'form-group-sm col-xs-3';
    public $rows = '30';
    
    public function __construct($key, $field, $value = NULL) {
        if(is_array($field)) {
            $this->parseFieldOptions($field);
        } else {
            $this->fieldType = $field;
            $this->label = $key;
        }
        
        if($this->fieldType == 'bool' && empty($this->availableValues)) {
            $this->availableValues = array('0' => 'No', '1' => 'Yes');
        }
        
        $this->name = $key;
        
        if($value) {
            $this->value = $value;
        }
    }
    
    public function parseFieldOptions($options) {
        if(!empty($options['type'])) {
            $this->fieldType = $options['type'];
        }
        
        if(!empty($options['default'])) {
            $this->value = $options['default'];
        }
        
        if(!empty($options['values'])) {
            $this->availableValues = $options['values'];
        }
        
        if(!empty($options['size'])) {
            $this->size = $options['size'];
        }
        
        if(!empty($options['label'])) {
            $this->label = $options['label'];
        }
        
        if(!empty($options['rows'])) {
            $this->rows = $options['rows'];
        }
    }
}
