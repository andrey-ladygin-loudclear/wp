<?php

namespace GL\Classes;

Class DB {

    private $wpdb;
	protected static $table;
    
	public function __construct() {
        global $wpdb;
		$this->wpdb = $wpdb;
    }
    
    public static function getTable() {
    	return self::getPrefix() . static::$table;
	}
    
    public static function getPrefix() {
		return 'wp_';
//    	global $wpdb;
//		return $wpdb->prefix;
	}
    
    protected function delete(array $where) {
		return $this->wpdb->delete(self::getTable(), $where);
	}
	
	protected function insert(array $data) {
		$this->wpdb->insert(self::getTable(), $data);
		return $this->wpdb->insert_id;
	}
	
	protected function get(array $where) {
		return $this->wpdb->get_row("SELECT * FROM ".self::getTable()." WHERE ".$this->implode($where).";", ARRAY_A);
	}
	
	protected function update(array $data, array $where) {
		return $this->wpdb->update(self::getTable(), $data, $where);
	}
	
	protected function query($sql) {
		return $this->wpdb->get_results($sql, ARRAY_A);
	}

	protected function getLastQuery() {
	    return $this->wpdb->last_query;
    }
	
	private function implode($arr) {
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