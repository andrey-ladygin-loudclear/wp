<?php

namespace GL\Classes;

Class Customize {
	
	public function add_options($wp_customize) {
		//https://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
		
		
		$this->addTheme($wp_customize);
		
		
		$wp_customize->add_setting('grid_header_navbar');
		$wp_customize->add_control( new \WP_Customize_Control( $wp_customize, 'grid_header_navbar',
			array(
				'label' => 'Navbar',
				'section' => 'title_tagline',
				'settings' => 'grid_header_navbar',
				'type' => 'radio',
				'choices' => array(
					'dark'   => 'Dark',
					'light'  => 'Light'
				)
			)
		));
		
		
		
		$wp_customize->add_section( 'starter_new_section_name' , array(
			'title'    => 'Visible Section Name',
			'priority' => 30
		) );
		
		$wp_customize->add_setting( 'starter_new_setting_name' , array(
			'default'   => '#000000',
			'transport' => 'refresh',
		) );
		
		$wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'starter_new_setting_name', array(
			'label'    => 'Header Color',
			'section'  => 'starter_new_section_name',
			'settings' => 'starter_new_setting_name',
		) ) );
		
		
		
		
		
		
		
//		$wp_customize->add_setting( 'setting_id', array(
//			'type' => 'theme_mod', // or 'option'
//			'capability' => 'edit_theme_options',
//			'theme_supports' => '', // Rarely needed.
//			'default' => '',
//			'transport' => 'refresh', // or postMessage
//			'sanitize_callback' => '',
//			'sanitize_js_callback' => '', // Basically to_json.
//		) );
//		//https://codex.wordpress.org/Theme_Customization_API
//		/** @var $wp_customize \WP_Customize_Setting **/
//		$wp_customize->add_setting( 'header_textcolor' , array(
//			'default'   => '#000000',
//			'transport' => 'refresh',
//		) );
//		$wp_customize->add_section( 'mytheme_new_section_name' , array(
//			'title'      => __( 'Visible Section Name', 'mytheme' ),
//			'priority'   => 30,
//		) );
//		$wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'link_color', array(
//			'label'      => __( 'Header Color', 'mytheme' ),
//			'section'    => 'your_section_id',
//			'settings'   => 'your_setting_id',
//		) ) );
		
		
		$wp_customize->add_setting('your_theme_logo');
// Add a control to upload the logo
		$wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'your_theme_logo',
			array(
				'label' => 'Upload Logo',
				'section' => 'title_tagline',
				'settings' => 'your_theme_logo',
			) ) );
	}
	
	private function addTheme($wp_customize) {
		$wp_customize->add_section('grid_theme', array(
			'title'    => 'Theme',
			'priority' => 30
		));
		
		$wp_customize->add_setting('grid_theme', array('default' => 'dark', 'transport' => 'refresh'));
		$wp_customize->add_setting('grid_theme_color', array('default' => '#000000', 'transport' => 'refresh'));
		$wp_customize->add_setting('grid_theme_fonts', array('default' => 'Open Sans', 'transport' => 'refresh'));
		
		$wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'grid_theme',
			array(
				'label' => 'Theme Style',
				'section' => 'grid_theme',
				'settings' => 'grid_theme',
				'type' => 'radio',
				'choices' => array(
					'wood'   => 'Wood',
					'dark'   => 'Dark',
					'light'  => 'Light'
				)
			)
		));
		
		$wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'grid_theme_color', array(
			'label'    => 'Header Color',
			'section'  => 'grid_theme',
			'settings' => 'grid_theme_color',
		)));
		
		$wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'grid_theme_fonts',
			array(
				'label' => 'Fonts',
				'section' => 'grid_theme',
				'settings' => 'grid_theme_fonts',
				'type' => 'radio',
				'choices' => array(
					'Open Sans' => 'Open Sans',
					'Arial' => 'Arial',
				)
			)
		));
	}
	
}
