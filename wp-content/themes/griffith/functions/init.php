<?php

class GriffithInit {
    function __construct() {
        add_action('after_setup_theme', array($this, 'init'));
    }

    function init() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        // Hide admin bar
        show_admin_bar(false);
    }
}

$griffithInit = new GriffithInit();