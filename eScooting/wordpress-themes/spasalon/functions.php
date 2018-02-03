<?php

// Global variables define

define('WEBRITI_TEMPLATE_DIR_URI' , get_template_directory_uri() );	

define('WEBRITI_TEMPLATE_DIR' , get_template_directory() );

define('WEBRITI_THEME_FUNCTIONS_PATH' , WEBRITI_TEMPLATE_DIR.'/functions');

define( 'WEBR_FRAMEWORK_DIR', get_template_directory_uri().'/functions' );



// Theme functions file including

require( WEBRITI_THEME_FUNCTIONS_PATH . '/default_data.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/scripts/script.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/webriti_nav_walker.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/sidebars.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/banner-settings.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/general-settings.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/home-page.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/font/font.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/meta-box/metabox.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/template-tag.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/wbr-register-page-widget.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/wbr-news-widget.php');

require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/post-widget.php');

// Spasalon Info Page
require( WEBRITI_THEME_FUNCTIONS_PATH . '/spasalon-info/welcome-screen.php');



if ( ! function_exists( 'spasalon_setup' ) ) :

function spasalon_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	
	load_theme_textdomain( 'spasalon', get_template_directory() . '/lang' );

	
	
	
	// Add default posts and comments RSS feed links to head.
	
	add_theme_support( 'automatic-feed-links' );

	
	
	/*
	 * Let WordPress manage the document title.
	 */
	 
	add_theme_support( 'title-tag' );
	
	
	
	
	// supports featured image
	
	add_theme_support( 'post-thumbnails' );

	
	
	// This theme uses wp_nav_menu() in two locations.
	
	register_nav_menus( array(
	
		'primary' => __( 'Primary Menu', 'spasalon' ),
		
		'footer'  => __( 'Footer Menu', 'spasalon' ),
		
	) );
	
	
	// woocommerce support
	
	add_theme_support( 'woocommerce' );
	
	
	
	//Custom logo
	
	add_theme_support( 'custom-logo' , array(
	
	   'class'       => 'navbar-brand',
	   
	   'width'       => 150,
	   
	   'height'      => 35,
	   
	   'flex-width' => false,
	   
	   'flex-height' => false,
	   
	) );
	
}
endif; // spasalon_setup

add_action( 'after_setup_theme', 'spasalon_setup' );




// Replace logo Anchor class

add_filter('get_custom_logo', 'custom_logo_output', 10);

function custom_logo_output( $html ){
	
	$html = str_replace( 'custom-logo-link', 'navbar-brand', $html );
	
return $html;

}

// excerpt length

function spasalon_excerpt_length( $length ) {
	
	return 20;
	
}

add_filter( 'excerpt_length', 'spasalon_excerpt_length', 999 );




// Replaces the excerpt "more" text by a link

function new_excerpt_more($more) {
	
    global $post;
	
	$link = sprintf( '<p><a href="%1$s" class="more-link">%2$s</a></p>',
	
		esc_url( get_permalink( get_the_ID() ) ),
		
		sprintf( __( 'Read More' , 'spasalon' ) )
		
	);
	
	return ' &hellip; ' . $link;
	
}

add_filter('excerpt_more', 'new_excerpt_more');





function modify_read_more_link() {
	
	global $post;
	
	$link = '<a class="more-link" href="' . get_permalink() . '">'.__( 'Read More' , 'spasalon' ).'</a>';
	
    return $link;
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );





// content width 

function spasalon_content_width() {
	
	$GLOBALS['content_width'] = apply_filters( 'spasalon_content_width', 960 );
	
}

add_action( 'after_setup_theme', 'spasalon_content_width', 0 );


// custom css 

function spasalon_custom_css_function(){
	
	$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
	
	echo '<style>';
	
	echo $current_options['spa_custom_css'];
	
	echo '</style>';
	
	echo '<style>';
	
	echo '
	
		h1, .h1 { 
			font-family: "'.$current_options['h1_fontfamily'].'"; 
			font-size: '.$current_options['h1_size'].'px; 
			line-height: '.($current_options['h1_size'] + 4).'px;
			font-style: '.$current_options['h1_fontstyle'].';
		}
		
		h2, .h2 { 
			font-family: "'.$current_options['h2_fontfamily'].'"; 
			font-size: '.$current_options['h2_size'].'px; 
			line-height: '.($current_options['h2_size'] + 5).'px;
			font-style: '.$current_options['h2_fontstyle'].';
		}
		
		h3, .h3 { 
			font-family: "'.$current_options['h3_fontfamily'].'"; 
			font-size: '.$current_options['h3_size'].'px; 
			line-height: '.($current_options['h3_size'] + 6).'px;
			font-style: '.$current_options['h3_fontstyle'].';
		}
		
		h4, .h4 { 
			font-family: "'.$current_options['h4_fontfamily'].'"; 
			font-size: '.$current_options['h4_size'].'px; 
			line-height: '.($current_options['h4_size'] + 7).'px;
			font-style: '.$current_options['h4_fontstyle'].';
		}
		
		h5, .h5 { 
			font-family: "'.$current_options['h5_fontfamily'].'"; 
			font-size: '.$current_options['h5_size'].'px; 
			line-height: '.($current_options['h5_size'] + 6).'px;
			font-style: '.$current_options['h5_fontstyle'].';
		}
		
		h6, .h6 { 
			font-family: "'.$current_options['h6_fontfamily'].'"; 
			font-size: '.$current_options['h6_size'].'px; 
			line-height: '.($current_options['h6_size'] + 8).'px;
			font-style: '.$current_options['h6_fontstyle'].';
		}
		
		.section-title{ 
			font-family: "'.$current_options['home_section_title_fontfamily'].'"; 
			font-size: '.$current_options['home_section_title_fontsize'].'px; 
			line-height: '.($current_options['home_section_title_fontsize'] + 3).'px;
			font-style: '.$current_options['home_section_title_fontstyle'].';
		}
		
		.section-subtitle{ 
			font-family: "'.$current_options['home_section_desc_fontfamily'].'"; 
			font-size: '.$current_options['home_section_desc_fontsize'].'px; 
			line-height: '.($current_options['home_section_desc_fontsize'] + 9).'px;
			font-style: '.$current_options['home_section_desc_fontstyle'].';
		}
		
		.navbar-default .navbar-nav > li > a,
		.dropdown-menu > li > a	{
			font-family: "'.$current_options['menu_title_fontfamily'].'"; 
			font-size: '.$current_options['menu_title_fontsize'].'px; 
			line-height: '.($current_options['menu_title_fontsize'] + 5).'px;
			font-style: '.$current_options['menu_title_fontstyle'].';
		}
		
		.entry-header .entry-title{
			font-family: "'.$current_options['post_title_fontfamily'].'"; 
			font-size: '.$current_options['post_title_fontsize'].'px; 
			line-height: '.($current_options['post_title_fontsize'] + 6).'px;
			font-style: '.$current_options['post_title_fontstyle'].';
		}
		
		p, .entry-content, .post .entry-content {
			font-family: "'.$current_options['postexcerpt_fontfamily'].'"; 
			font-size: '.$current_options['postexcerpt_title_fontsize'].'px; 
			line-height: '.($current_options['postexcerpt_title_fontsize'] + 10).'px;
			font-style: '.$current_options['postexcerpt_fontstyle'].';
		}
		
		.widget .widget-title, .footer-sidebar .widget .widget-title{
			font-family: "'.$current_options['widget_title_fontfamily'].'"; 
			font-size: '.$current_options['widget_title_fontsize'].'px; 
			line-height: '.($current_options['widget_title_fontsize'] + 6).'px;
			font-style: '.$current_options['widget_title_fontstyle'].';
		}
	';
	
	echo '</style>';
		
	}
add_action('wp_head','spasalon_custom_css_function');

the_tags();