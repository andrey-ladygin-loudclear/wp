<?php

namespace GL\Classes;

Class Settings
{
	CONST KEY = 'gl-settings';
	private $options;
	
	public function __construct()
	{
		$this->options = $this->getOptions();
	}
	
	public function get($key)
	{
		if(!empty($this->options[$key]))
		{
			return $this->options[$key];
		}
		
		return FALSE;
	}
	
	public function page()
	{
		if (!empty($_POST)) {
			$this->save($_POST);
		}

		Assets::addDefaults();
		Assets::enqueue();
        
		View::load('Templates/Backend/Settings/options', array(
			'options' => $this->getOptions()
		));
	}
	
	private function save($options) {
		update_option(Settings::KEY, $options);
	}
	
	private function getOptions() {
		return get_option(Settings::KEY);
	}
	
	public static function getMetaBoxPostTypes() {
		$postTypes = array();
		
		foreach(get_post_types('', 'names') as $post_type) {
			if(!in_array($post_type, Config::$excluded_post_types)) {
				$postTypes[] = $post_type;
			}
		}
		
		return $postTypes;
	}
}