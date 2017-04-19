<?php

namespace GL\Classes;

use GL\Helpers\CustomizeHelper;

Class Customize {
	
	private $wp_customize;
	private $helper;
	
	public function add_options($wp_customize) {
        $this->wp_customize = $wp_customize;
        $this->helper = new CustomizeHelper($wp_customize);
	    
		//https://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
		
		$this->addTheme();
		$this->addElements();
		$this->addWidgets();
	}
	
	private function addTheme() {
		$this->wp_customize->add_panel('grid_theme', array(
			'priority'       => 6,
			'capability'     => 'edit_theme_options',
			'title'          => 'Theme',
			'description'    => 'Theme settings',
		));
		
		$this->addThemeStyles();
		$this->addThemeFonts();
		//$this->addThemeMenus();
		//$this->addThemeColors();
	}
	
	private function addElements() {
		$this->wp_customize->add_panel('grid_elements', array(
			'priority'       => 7,
			'capability'     => 'edit_theme_options',
			'title'          => 'Elements',
			'description'    => 'Theme Elements',
		));
		
		
		//$this->wp_customize->add_section('grid_elements_h1', array('title'=>'H1 (Titles)','priority' => 1,'panel'=>'grid_elements'));
		
		foreach(Config::$elements as $element => $title) {
			$this->wp_customize->add_section(CustomizeHelper::getElementSectionName($element), array('title'=>$title,'panel'=>'grid_elements'));
			$this->addOptions($element);
		}
	}
	
	private function addOptions($name) {
		$this->helper->addColorSetting($name);
		$this->helper->addFontSetting($name);
		$this->helper->addSizeSetting($name);
		$this->helper->addHoverSetting($name);
	}
	
	private function addThemeStyles() {
		$this->wp_customize->add_section('grid_theme_styles', array(
			'title'    => 'Styles',
			'priority' => 1,
			'panel' => 'grid_theme'
		));
		$this->wp_customize->add_setting('grid_theme_styles', array(
			'default' => 'light',
			'transport' => 'refresh'
		));
		$this->wp_customize->add_control(new \WP_Customize_Control($this->wp_customize, 'grid_theme_styles', array(
			'label' => 'Theme Style',
			'section' => 'grid_theme_styles',
			'settings' => 'grid_theme_styles',
			'type' => 'radio',
			'choices' => self::getThemes()
		)));
	}
	
	private function addThemeFonts() {
		$this->wp_customize->add_section('grid_theme_fonts', array(
			'title' => 'Fonts',
			'priority' => 2,
			'panel' => 'grid_theme'
		));
		$this->wp_customize->add_setting('grid_theme_fonts', array(
			'default' => 'Open Sans',
			'transport' => 'refresh'
		));
		$this->wp_customize->add_control(new \WP_Customize_Control($this->wp_customize, 'grid_theme_fonts',
			array(
				'label' => 'Fonts',
				'section' => 'grid_theme_fonts',
				'settings' => 'grid_theme_fonts',
				'type' => 'radio',
				'choices' => Config::$fonts
			)
		));
	}
	
	private function addWidgets()
    {
        $this->wp_customize->add_panel('grid_widgets', array(
            'priority'       => 10,
            'capability'     => 'edit_theme_options',
            'title'          => 'Widgets',
            'description'    => 'Widget settings',
        ));
        
        foreach(\GL_Grid_Layout::$builder as $slug => $widget)
        {
            $section_name = 'grid_widgets' . $slug;
            $control_name = 'grid_widgets_control' . $slug;
            
            $this->wp_customize->add_section($section_name, array(
                'title'    => $widget,
                //'priority' => 31,
                'panel' => 'grid_widgets'
            ));
    
            $this->wp_customize->add_setting($control_name, array('default' => '#000000', 'transport' => 'refresh'));
    
            $this->wp_customize->add_control(new \WP_Customize_Color_Control($this->wp_customize, $control_name, array(
                'label'    => 'Header Color',
                'section'  => $section_name,
                'settings' => $control_name,
            )));
        }
    }
    
    public function mce_buttons($buttons) {
		$buttons[] = 'superscript';
		$buttons[] = 'subscript';
		$buttons[] = 'fontselect';
	
		return $buttons;
	}
	
    public function mce_fonts($initArray) {
		$theme_advanced_fonts = '';
	
		foreach(Config::$fonts as $font => $name) {
			$theme_advanced_fonts .= "$name=$font;";
		}
	
		$initArray['font_formats'] = $theme_advanced_fonts;
		return $initArray;
	}
	
	public static function getThemes() {
		$themes = array();
		
		foreach(Config::$themes as $name => $theme) {
			$themes[$name] = ucfirst($name);
		}
		
		return $themes;
	}
	
	public static function getElementOption($name, $type) {
		$setting = CustomizeHelper::getElementSettingName($name, $type);
		$option = get_theme_mod($setting);
		
		if($option) {
			return $option;
		}
		
		$theme = get_theme_mod('grid_theme', 'light');
		
		if(!empty(Config::$themes[$theme]['elements'][$name][$type])) {
			return Config::$themes[$theme]['elements'][$name][$type];
		}
		
		return '';
	}
	
	public static function getOption($name) {
		$option = get_theme_mod($name);
		
		if($option) {
			return $option;
		}
		
		$theme = get_theme_mod('grid_theme', 'light');
		return Config::$themes[$theme][$name];
	}
}
