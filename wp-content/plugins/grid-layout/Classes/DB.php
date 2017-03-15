<?php

namespace GL;

Class DB {

    private $wpdb;
    private $prefix;
	protected $table;
    
	public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . $this->table;
    }
    
    protected function delete(array $where) {
		return $this->wpdb->delete($this->table, $where);
	}
	
	protected function insert(array $data) {
		$this->wpdb->insert($this->table, $data);
		return $this->wpdb->insert_id;
	}
	
	protected function get(array $where) {
		return $this->wpdb->get_row("SELECT * FROM {$this->table} WHERE ".$this->implode($where).";", ARRAY_A);
	}
	
	protected function update(array $data, array $where) {
		return $this->wpdb->update($this->table, $data, $where);
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