<?php

namespace GL;

Class DB {

    private static $instance;
    private static $wpdb;
    private $table = 'wp_gl_grid';
    private $fields = array(
        'parent_id' => 0,
        'parent_type' => 'page',
        'widget_id' => 0,
        'widget_name' => '',
        'full_widget' => 0,
        'size_x' => 0,
        'size_y' => 0,
        'row' => 0,
        'col' => 0
    );

    private function __construct() {
        global $wpdb;
        self::$wpdb = $wpdb;
    }

    public static function getInstance() {
        if(!empty(self::$instance)) {
            return self::$instance;
        }
        self::$instance = new self;
        return self::$instance;
    }

    public function checkWidget($widget)
    {
        return self::$wpdb->get_row("
            SELECT * 
            FROM wp_gl_grid 
            WHERE parent_id = {$widget['parent_id']} 
                AND parent_type = '{$widget['parent_type']}' 
                AND widget_id = {$widget['widget_id']} 
                AND widget_name = '{$widget['widget_name']}'
        ;", ARRAY_A);
    }
    
    public function addWidget($name) {
		self::$wpdb->insert('wp_gl_widget_' . $name, array('id' => NULL), array());
		return self::$wpdb->insert_id;
	}

    public function prepare($widget) {
        return array_merge($this->fields, $widget);
    }

    public function addOrUpdate($widget)
    {
        $widget = $this->prepare($widget);

        if(empty($this->checkWidget($widget))) {
            return self::$wpdb->insert($this->table, $widget);
        }

        $where = array(
            'parent_id'     => $widget['parent_id'],
            'parent_type'   => $widget['parent_type'],
            'widget_id'     => $widget['widget_id'],
            'widget_name'   => $widget['widget_name']
        );

        $widget = array_diff_key($widget, $where);

        return self::$wpdb->update($this->table, $widget, $where);
    }

    public function print_error() {
        self::$wpdb->print_error();
    }

    public function getWidgetsHierarchy($parent_id, $parent_type = 'page') {
        $sql = "SELECT wgg.*, wp_gl_widget_glyph.*, wp_gl_widget_image.*, wp_gl_widget_text.*
            FROM {$this->table} wgg
            LEFT JOIN wp_gl_widget_glyph ON wp_gl_widget_glyph.id = wgg.widget_id AND wgg.widget_name = 'glyph'
            LEFT JOIN wp_gl_widget_image ON wp_gl_widget_image.id = wgg.widget_id AND wgg.widget_name = 'image'
            LEFT JOIN wp_gl_widget_text ON wp_gl_widget_text.id = wgg.widget_id AND wgg.widget_name = 'text'
            WHERE wgg.parent_id = {$parent_id} AND wgg.parent_type = '{$parent_type}'
            ORDER BY row, col
        ;";

        return self::$wpdb->get_results($sql, ARRAY_A);
    }

    public function getWidget($widget_name, $widget_id) {
        return self::$wpdb->get_row(" SELECT * FROM wp_gl_widget_{$widget_name} WHERE id = {$widget_id};", ARRAY_A);
    }
    
    public function getGrid($post_id, $parent_type = 'page') {
		return self::$wpdb->get_results("SELECT * FROM wp_gl_grid wgg

            LEFT JOIN wp_gl_widget_glyph ON wp_gl_widget_glyph.id = wgg.widget_id AND wgg.widget_name = 'glyph'
            LEFT JOIN wp_gl_widget_image ON wp_gl_widget_image.id = wgg.widget_id AND wgg.widget_name = 'image'
            LEFT JOIN wp_gl_widget_text ON wp_gl_widget_text.id = wgg.widget_id AND wgg.widget_name = 'text'
WHERE parent_id = {$post_id} AND parent_type = '{$parent_type}';", OBJECT);
	}

    public function updateWidget($widget_name, $widget_id, $data) {
        self::$wpdb->update("wp_gl_widget_{$widget_name}", $data, array('id' => $widget_id));
        //var_dump(self::$wpdb->last_error);
    }
}