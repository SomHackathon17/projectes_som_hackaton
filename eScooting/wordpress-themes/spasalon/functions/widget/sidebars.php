<?php 
// sidebars
add_action( 'widgets_init', 'spasalon_widgets_init' );
function spasalon_widgets_init(){
	
	$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
	$service_layout = 12 / $current_options['service_layout'];
	$news_layout = 12 / $current_options['news_layout'];
	
	register_sidebar( array(
	'name' => __( 'Sidebar widget area', 'spasalon' ),
	'id' => 'sidebar-primary',
	'description' => __('Sidebar widget area','spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Service content widget area', 'spasalon' ),
	'id' => 'sidebar-service',
	'description' => __( 'Service content widget area', 'spasalon' ),
	'before_widget' => '<div id="%1$s" class="col-md-'.$service_layout.' col-sm-6 col-xs-12 widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Project content widget area', 'spasalon' ),
	'id' => 'sidebar-project',
	'description' => __( 'Project content widget area', 'spasalon' ),
	'before_widget' => '<div id="%1$s" class="widget item-product  %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
	) );
	
	register_sidebar( array(
	'name' => __( 'News section widget area', 'spasalon' ),
	'id' => 'sidebar-news',
	'description' => __( 'News section widget area', 'spasalon' ),
	'before_widget' => '<div id="%1$s" class="col-md-'.$news_layout.' widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer sidebar one', 'spasalon' ),
	'id' => 'footer-sidebar1',
	'description' => __( 'Footer sidebar one', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer sidebar two', 'spasalon' ),
	'id' => 'footer-sidebar2',
	'description' => __( 'Footer sidebar two', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer sidebar three', 'spasalon' ),
	'id' => 'footer-sidebar3',
	'description' => __( 'Footer sidebar three', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer sidebar four', 'spasalon' ),
	'id' => 'footer-sidebar4',
	'description' => __( 'Footer sidebar four', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Woocommerce sidebar widget area', 'spasalon' ),
	'id' => 'woocommerce-1',
	'description' => __( 'Woocommerce sidebar widget area', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
}