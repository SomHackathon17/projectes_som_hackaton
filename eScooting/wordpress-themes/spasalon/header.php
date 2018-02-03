<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php 
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
?>
<!-- Navbar -->	
<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
				<?php
				
				if( has_custom_logo() ) {
					
					the_custom_logo();  // Spasaloon custom logo support
					
				} else {
					
					echo '<a class="navbar-brand" href="'.esc_url( home_url( '/' ) ).'">';
					
					if( $current_options['upload_image'] == '' ) {
						
						bloginfo('name');   // if no custom logo than print bloginfo name
						
					}
					
					else {
						
						$current_options['upload_image'] = ( $current_options['upload_image'] != '' ? $current_options['upload_image'] : get_template_directory_uri() . '/images/logo.png' );
						
						$current_options['width'] = ( $current_options['width'] != '' ? $current_options['width'] : 150 );
						
						$current_options['height'] = ( $current_options['height'] != '' ? $current_options['height'] : 35 );
						
						echo '<img alt="'.get_bloginfo("name").'" src="'.$current_options['upload_image'].'" class="img-responsive" style="width:'.$current_options['width'].'px; height:'.$current_options['height'].'px;">';
					
					}
					
					echo '</a>';
					
				}
			
				?>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php echo 'Toggle navigation'; ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php 
			
				wp_nav_menu( array(
				
				'theme_location' => 'primary',
				
				'container'  => 'nav-collapse collapse navbar-inverse-collapse',
				
				'menu_class' => 'nav navbar-nav navbar-right',
				
				'fallback_cb' => 'webriti_fallback_page_menu',
				
				'walker' => new webriti_nav_walker()) 
				
				);  // primary support menu
				
			?>
		</div>
	</div>
</nav>	
<!-- End of Navbar -->

<div class="clearfix"></div>