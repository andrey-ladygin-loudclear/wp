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
        
//        Assets::add('assets/plugins/bootstrap/css/bootstrap.min.css');
//        Assets::add('assets/plugins/bootstrap/css/bootstrap-theme.min.css');
//        Assets::add('assets/plugins/bootstrap/js/bootstrap.min.js');
		Assets::addDefaults();
		Assets::enqueue();
        
		View::load('Templates/Backend/settings', array(
			'options' => $this->getOptions()
		));
	}
	
	private function save($options)
	{
		update_option(Settings::KEY, $options);
	}
	
	private function getOptions()
	{
		return get_option(Settings::KEY);
	}
}