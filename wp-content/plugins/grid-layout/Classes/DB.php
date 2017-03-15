<?php

namespace GL\Classes;

Class DB {

    private $wpdb;
    private $prefix;
	protected static $table;
    
	public function __construct() {
        global $wpdb;
		$this->wpdb = $wpdb;
    }
    
    public static function getPrefix() {
		return 'wp_';
//    	global $wpdb;
//		return $wpdb->prefix;
	}
    
    protected function delete(array $where) {
		return $this->wpdb->delete(self::$table, $where);
	}
	
	protected function insert(array $data) {
		$this->wpdb->insert(self::$table, $data);
		return $this->wpdb->insert_id;
	}
	
	protected function get(array $where) {
		return $this->wpdb->get_row("SELECT * FROM ".self::$table." WHERE ".$this->implode($where).";", ARRAY_A);
	}
	
	protected function update(array $data, array $where) {
		return $this->wpdb->update(self::$table, $data, $where);
	}
	
	protected function query($sql) {
		return $this->wpdb->get_results($sql, ARRAY_A);
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