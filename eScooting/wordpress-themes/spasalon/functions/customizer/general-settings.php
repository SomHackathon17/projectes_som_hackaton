<?php 
function spasalon_general_settings_customizer( $wp_customize ){

// list contro categories

	/* general settings */
	$wp_customize->add_panel( 'general_settings', array(
		'priority'       => 125,
		'capability'     => 'edit_theme_options',
		'title'      => __('General settings', 'spasalon'),
	) );
	
	/* Banner section */
		$wp_customize->add_section( 'banner_section' , array(
			'title'      => __('Banner setting', 'spasalon'),
			'panel'  => 'general_settings'
		) );
		
			// banner settings
			$wp_customize->add_setting( 'spa_theme_options[spa_bannerstrip_enable]' , array(
			'default' => 'yes',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[spa_bannerstrip_enable]' , array(
			'label'          => __('Banner strip', 'spasalon' ),
			'section'        => 'banner_section',
			'type'           => 'radio',
			'choices'        => array(
				'yes' => 'ON',
				'no'  => 'OFF'
			) ) );
			
			// banner call us no
			$wp_customize->add_setting( 'spa_theme_options[call_us]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[call_us]' , array(
			'label' => __('Call us on','spasalon'),
			'section'        => 'banner_section',
			'type'           => 'text'
			) );
			
			// banner call us text
			$wp_customize->add_setting( 'spa_theme_options[call_us_text]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[call_us_text]' , array(
			'label'          => __( 'Call us text', 'spasalon' ),
			'section'        => 'banner_section',
			'type'           => 'text'
			) );
			
		/* custom css section */
		$wp_customize->add_section( 'custom_css_section' , array(
			'title'      => __('Custom CSS', 'spasalon'),
			'panel'  => 'general_settings'
		) );
		
			// banner settings
			$wp_customize->add_setting( 'spa_theme_options[spa_custom_css]' , array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[spa_custom_css]' , array(
			'label'          => __( 'Custom CSS', 'spasalon' ),
			'section'        => 'custom_css_section',
			'type'           => 'textarea'
			) );
			
		/* footer copyright section */
		$wp_customize->add_section( 'copyright_section' , array(
			'title'      => __('Footer copyright settings', 'spasalon'),
			'panel'  => 'general_settings'
		) );
		
			// banner settings
			$wp_customize->add_setting( 'spa_theme_options[footer_tagline]' , array(
			'sanitize_callback' => 'spasalon_copyright_sanitize_text',
			'default' => '&copy; Copyright 2016. All Rights Reserved by <a href="#">Webriti</a>',
			'type'=>'option',
			) );
			$wp_customize->add_control('spa_theme_options[footer_tagline]' , array(
			'label'          => __('Copyright text', 'spasalon' ),
			'section'        => 'copyright_section',
			'type'           => 'textarea'
			) );
	
}
add_action( 'customize_register', 'spasalon_general_settings_customizer' );

function spasalon_copyright_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

}
