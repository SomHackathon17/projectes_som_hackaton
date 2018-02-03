<?php
add_action( 'wp_enqueue_scripts', 'dream_spa_theme_css',999);
function dream_spa_theme_css() {
	wp_enqueue_style( 'dreamspa-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'dreamspa-child-style', get_stylesheet_uri(), array( 'dreamspa-parent-style' ) );
	wp_dequeue_style( 'default');
	wp_enqueue_style( 'dreamspa-custom-style', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'dreamspa-default', get_stylesheet_directory_uri()."/css/default.css" );
}

require( get_stylesheet_directory() . '/functions/customizer/home-page.php' );	



add_action( 'customize_register', 'dream_spa_remove_custom', 1000 );
function dream_spa_remove_custom($wp_customize) {
  $wp_customize->remove_panel('slider_panel');
  $wp_customize->remove_panel('banner_settings');
  $wp_customize->remove_section( 'banner_section' );
  
  
}

function dream_spa_theme_setup(){
	load_theme_textdomain( 'dream-spa', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'dream_spa_theme_setup' );

function dream_spa_default_data(){
	return array(
	
	// general settings
	'dreamspa_slider_post' =>'',
	'slider_caption_align' => 'left',
	'slider_caption_title_color ' => '#fff',
	'slider_caption_overlay_color' =>'#fff',
	);
}

add_action('wp_head','dream_spa_caption_color');
function dream_spa_caption_color()
{
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), dream_spa_default_data() );
	?>
	<style>
	.txt p
	{
	color:<?php echo $current_options['slider_caption_overlay_color']; ?> !important;	
	}
	
	h1.slider_txt
	{
	color:<?php echo $current_options['slider_caption_title_color']; ?> !important;		
	}
	</style>
<?php } ?>