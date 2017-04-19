<?php
namespace GL\Helpers;

use GL\Classes\Config;
use GL\Classes\Customize;

class CustomizeHelper {
	
	private $wp_customize;
	
	public function __construct($wp_customize) {
		$this->wp_customize = $wp_customize;
	}
	
	public static function getElementSectionName($name) {
		return "grid_element_{$name}";
	}
	
	public static function getElementSettingName($name, $type) {
		return "grid_element_{$name}_{$type}";
	}
	
	public function addColorSetting($name) {
		$setting = self::getElementSettingName($name, 'color');
		$this->wp_customize->add_setting($setting, array('default' => Customize::getElementOption($name, 'color'),'transport' => 'refresh'));
		$this->wp_customize->add_control(new \WP_Customize_Color_Control($this->wp_customize, $setting, array(
			'label'    => 'Color',
			'section'  => self::getElementSectionName($name),
			'settings' => $setting,
		)));
	}
	
	public function addHoverSetting($name) {
		$setting = self::getElementSettingName($name, 'hover');
		$this->wp_customize->add_setting($setting, array('default' => Customize::getElementOption($name, 'hover'),'transport' => 'refresh'));
		$this->wp_customize->add_control(new \WP_Customize_Color_Control($this->wp_customize, $setting, array(
			'label'    => 'Hover Color',
			'section'  => self::getElementSectionName($name),
			'settings' => $setting,
		)));
	}
	
	public function addFontSetting($name) {
		$setting = self::getElementSettingName($name, 'font');
		$this->wp_customize->add_setting($setting, array('default' => Customize::getElementOption($name, 'font'),'transport' => 'refresh'));
		$this->wp_customize->add_control(new \WP_Customize_Control($this->wp_customize, $setting, array(
			'label' => 'Font',
			'section'  => self::getElementSectionName($name),
			'settings' => $setting,
			'type' => 'radio',
			'choices' => Config::$fonts
		)));
	}
	
	public function addLogoSetting() {
		$this->wp_customize->add_setting('your_theme_logo');
		$this->wp_customize->add_control( new \WP_Customize_Image_Control( $this->wp_customize, 'your_theme_logo',
			array(
				'label' => 'Upload Logo',
				'section' => 'title_tagline',
				'settings' => 'your_theme_logo',
			) ) );
	}
	
	public function addSizeSetting($name) {
		$setting = self::getElementSettingName($name, 'size');
		$this->wp_customize->add_setting($setting, array('default' => Customize::getElementOption($name, 'size'),'transport' => 'refresh'));
		$this->wp_customize->add_control(new \WP_Customize_Control($this->wp_customize, $setting, array(
			'label' => 'Font Size',
			'section'  => self::getElementSectionName($name),
			'settings' => $setting,
			'type' => 'text'
		)));
	}
}
