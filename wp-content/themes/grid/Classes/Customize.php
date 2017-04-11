<?php

namespace GL\Classes;

Class Customize {
	
	public function add_options($wp_customize) {
		//https://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
		
		
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
		
		
		
		$wp_customize->add_setting( 'setting_id', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => '',
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '', // Basically to_json.
		) );
		//https://codex.wordpress.org/Theme_Customization_API
		/** @var $wp_customize \WP_Customize_Setting **/
		$wp_customize->add_setting( 'header_textcolor' , array(
			'default'   => '#000000',
			'transport' => 'refresh',
		) );
		$wp_customize->add_section( 'mytheme_new_section_name' , array(
			'title'      => __( 'Visible Section Name', 'mytheme' ),
			'priority'   => 30,
		) );
		$wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'link_color', array(
			'label'      => __( 'Header Color', 'mytheme' ),
			'section'    => 'your_section_id',
			'settings'   => 'your_setting_id',
		) ) );
		
		
		$wp_customize->add_setting('your_theme_logo');
// Add a control to upload the logo
		$wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'your_theme_logo',
			array(
				'label' => 'Upload Logo',
				'section' => 'title_tagline',
				'settings' => 'your_theme_logo',
			) ) );
	}
	
}
