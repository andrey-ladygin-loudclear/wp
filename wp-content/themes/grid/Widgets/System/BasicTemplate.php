<?php

namespace GL\Widgets\System;

use GL\Classes\Grid_Widget;
use GL\Classes\View;
use GL\Interfaces\GlyphInterface;
use GL\Interfaces\GridInterface;
use GL\Repositories\WidgetRepository;
use GL_Grid_Layout;

class BasicTemplate extends Widget {

    protected $view;
    protected $args;

    public function __construct($view = '', $args = array()) {
        $this->view = $view;
        $this->args = $args;

        parent::__construct();
    }

    public function view($view) {
        $this->view = $view;
    }

    public function args($args) {
        $this->args = $args;
    }

    public function draw() {
        View::load($this->view, array('widget' => $this, 'args' => $this->args));
    }
}