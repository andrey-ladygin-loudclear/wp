<?php

namespace GL\Classes;

Class DB {

    private static $wpdb;
	protected static $table;
    
	public function __construct() {
        global $wpdb;
		self::$wpdb = $wpdb;
    }
    
    public static function getTable() {
    	return self::getPrefix() . static::$table;
	}
    
    public static function getPrefix() {
		return 'wp_';
//    	global $wpdb;
//		return $wpdb->prefix;
	}
    
    protected static function delete(array $where) {
		return self::$wpdb->delete(self::getTable(), $where);
	}
	
	protected function insert(array $data) {
		self::$wpdb->insert(self::getTable(), $data);
		return self::$wpdb->insert_id;
	}
	
	protected static function get(array $where) {
		return self::$wpdb->get_row("SELECT * FROM ".self::getTable()." WHERE ".self::implode($where).";", ARRAY_A);
	}
	
	protected static function update(array $data, array $where) {
		return self::$wpdb->update(self::getTable(), $data, $where);
	}
	
	protected static function query($sql) {
		return self::$wpdb->get_results($sql, ARRAY_A);
	}

	protected static function getLastQuery() {
	    return self::$wpdb->last_query;
    }
	
	private static function implode($arr) {
		$queryStr = '';
		$terms = count($arr);
		foreach ($arr as $field => $value)
		{
			$terms--;
			$queryStr .= $field . ' = ' . $value;
			if ($terms)
			{
				$queryStr .= ' AND ';
			}
		}
		return $queryStr;
	}
}