<?php
// Webriti scripts
if( !function_exists('spasalon_scripts'))
{
	function spasalon_scripts(){
		
		$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
		
		// css
		wp_enqueue_style('style', get_stylesheet_uri() );
		wp_enqueue_style('bootstrap', WEBRITI_TEMPLATE_DIR_URI . '/css/bootstrap.css' );
		wp_enqueue_style('custom', WEBRITI_TEMPLATE_DIR_URI . '/css/custom.css' );
		wp_enqueue_style('default', WEBRITI_TEMPLATE_DIR_URI . '/css/default.css' );
		wp_enqueue_style('flexslider', WEBRITI_TEMPLATE_DIR_URI . '/css/flexslider.css' );
		
		wp_enqueue_style('spasalon-font', WEBRITI_TEMPLATE_DIR_URI . '/css/font/font.css' );
		wp_enqueue_style('spasalon-font-awesome', WEBRITI_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css' );
		
		// js
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'spasalon-bootstrap-js' , WEBRITI_TEMPLATE_DIR_URI . '/js/bootstrap.min.js' );
		wp_enqueue_script( 'spasalon-custom-js' , WEBRITI_TEMPLATE_DIR_URI . '/js/custom.js' );
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	}
}
add_action('wp_enqueue_scripts','spasalon_scripts');


function spasalon_admin_enqueue_scripts(){
	wp_enqueue_style('drag-drop-css', WEBRITI_TEMPLATE_DIR_URI . '/css/drag-drop.css');
}
add_action( 'admin_enqueue_scripts', 'spasalon_admin_enqueue_scripts' );


function spasalon_registers() {

	wp_enqueue_script( 'customizer_script', get_template_directory_uri() . '/js/customizer.js', array("jquery"), '20120206', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'spasalon_registers' );