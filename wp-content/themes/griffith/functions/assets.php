<?php

class GriffithAssets {
    protected $version = '1.3.2';

    function __construct($init = true) {
        if ($init) {
            $this->setupThumbnailSizes();
            add_filter('style_loader_tag', array($this, 'fixGtIe9Conditional'));
            add_action('wp_enqueue_scripts', array($this, 'enqueueAssets'));
            add_action('admin_enqueue_scripts', array($this, 'enqueueAdminAssets'));
        }
    }

    public static function getVersion() {
        $instance = new self(false);
        return $instance->version;
    }

    function enqueueAssets() {
        $this->setupScripts();
        $this->setupStyles();
    }

    function enqueueAdminAssets() {
        $this->setupAdminScripts();
        $this->setupAdminStyles();
    }

    function setupThumbnailSizes() {
        add_theme_support('post-thumbnails');
        add_image_size('program', 2300, 750, true);
        add_image_size('program-thumbnail', 1120, 640, true);
        add_image_size('widget', 540, 330, true);
        add_image_size('landing-page', 920, 850, true);
    }

    function setupScripts() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', array(), '2.1.4', true);
        wp_enqueue_script('jquery');
        wp_register_script('main', get_template_directory_uri() . '/js/main.js', array(), $this->version, true);
        wp_register_script('sly', get_template_directory_uri() . '/js/sly.js', array(), '1.0', true);
        wp_enqueue_script('sly');
        wp_enqueue_script('main');
    }

    function setupAdminScripts() {
        wp_register_script('adminScript', get_template_directory_uri() . '/js/admin.js', array('jquery'), $this->version, true);
        wp_localize_script('adminScript', 'griffith', array(
            'frontPageId' => get_option('page_on_front'),
        ));
        wp_enqueue_script('adminScript');
    }

    function setupStyles() {
        wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), $this->version, 'all');
        wp_enqueue_style('main');
        wp_style_add_data('main', 'conditional', 'gt IE 9');
        wp_register_style('ie9', get_template_directory_uri() . '/css/main-ie9.css', array(), $this->version, 'all');
        wp_enqueue_style('ie9');
        wp_style_add_data('ie9', 'conditional', 'lte IE 9');
    }

    function setupAdminStyles() {
        wp_register_style('adminStyle', get_template_directory_uri() . '/css/admin.css', array(), $this->version, 'all');
        wp_enqueue_style('adminStyle');
    }

    // Fixes incorrect default > IE9 conditional output
    function fixGtIe9Conditional($tag) {
        if (preg_match('/main.css/', $tag)) $tag = '<!-->' . $tag . '<!--';
        return $tag;
    }
}

$griffithNav = new GriffithAssets();
