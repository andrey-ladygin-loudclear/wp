<?php

namespace GL\Classes;

Class View {

    private $templates = array();
    private $assets;

    public static function load($view, $args = array()) {
        extract($args);
        $file = dirname(__FILE__)."/../{$view}.php";

        if(!file_exists($file)) {
            throw new \Exception("File '{$file}' does not exists");
        }

        include $file;
    }

    public static function make($view, $args = array()) {
        $instance = new self;
        $instance->add_template($view, $args);
        return $instance;
    }

    public function add_assets(Assets $assets) {
        $this->assets = $assets;
    }

    public function add_template($view, $args = array()) {
        $this->templates[] = array(
            'view' => $view,
            'args' => $args
        );
    }

    public function show() {
        if(!empty($this->assets)) {
            self::load('Templates/Components/assets', array('css' => $this->assets->getCss()));
        }

        foreach($this->templates as $template) {
            self::load($template['view'], $template['args']);
        }

        if(!empty($this->assets)) {
            self::load('Templates/Components/assets', array('js' => $this->assets->getJs()));
        }
    }

    public static function load_assets(Assets $assets) {
        self::load('Templates/Components/assets', array(
            'js' => $assets->getJs(),
            'css' => $assets->getCss()
        ));
    }

    public static function padding() {
        self::load('Templates/Components/paddingInput');
    }
    
    public static function input($name, $label = '', $value = '') {
        self::load('Templates/Components/form/input', array('name' => $name, 'label' => $label, 'value' => $value));
    }
    
    public static function select($name, $label = '', $options = array(), $value = '') {
        self::load('Templates/Components/form/select', array('name' => $name, 'label' => $label, 'options' => $options, 'value' => $value));
    }
    
    public static function multipleSelect($name, $label = '', $options = array(), $values = array()) {
        self::load('Templates/Components/form/multipleSelect', array('name' => $name, 'label' => $label, 'options' => $options, 'values' => (array) $values));
    }

    public static function text($name, $id, $label = '', $value = '', $rows = '') {
    	self::load('Templates/Components/form/textarea', array('name' => $name,'id' => $id,'label' => $label,'value' => $value,'rows' => $rows,));
    }
}