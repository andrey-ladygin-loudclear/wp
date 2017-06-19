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

    public static function exists($file)
    {
        $file = dirname(__FILE__)."/../{$file}.php";
        return file_exists($file);
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
            self::load('Templates/Backend/components/assets', array('css' => $this->assets->getCss()));
        }

        foreach($this->templates as $template) {
            self::load($template['view'], $template['args']);
        }

        if(!empty($this->assets)) {
            self::load('Templates/Backend/components/assets', array('js' => $this->assets->getJs()));
        }
    }

    public static function load_assets(Assets $assets) {
        self::load('Templates/Backend/components/assets', array(
            'js' => $assets->getJs(),
            'css' => $assets->getCss()
        ));
    }
}