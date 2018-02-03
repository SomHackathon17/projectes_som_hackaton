<?php
/**
 * Child themes template
 */
?>
<div id="child_themes" class="spasalon-tab-pane">

	<?php
		$current_theme = wp_get_theme();
	?>
<div class="container-fluid">
		<div class="row">	

	<div class="spasalon-pane-center">

		<h1><?php esc_html_e( 'Install & Use Spasalon Child Themes', 'spasalon' ); ?></h1>

		<p><?php esc_html_e( 'Below you will find a selection of spasalon center lite child themes that will totally transform the look of your site.', 'spasalon' ); ?></p>

	</div>

	<div class="col-md-4">
	<div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">
		<!-- spasalon Blue -->
		<div class="spasalon-child-theme-container">
			<div class="spasalon-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/functions/spasalon-info/img/dream-spa.png'; ?>" alt="<?php esc_html_e( 'Dream Spa Child Theme', 'spasalon' ); ?>" />
				<div class="spasalon-child-theme-description">
					<h2><?php esc_html_e( 'Dream Spa', 'spasalon' ); ?></h2>
				</div>
			</div>
			<div class="spasalon-child-theme-details">
				<?php if ( 'spasalon-blue' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name"><?php _e('Dream Spa','spasalon'); ?></span>
						<span class="theme-btn">
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=dream-spa' ), 'install-theme_dream-spa' ) ); ?>" class="button button-primary"><?php printf( __( 'Install %s now', 'spasalon' ), '<span class="screen-reader-text">dream-spa</span>' ); ?></a>
						<a class="button button-secondary" target="_blank" href="http://webriti.com/demo/wp/lite/dreamspa/"><?php esc_html_e( 'Live Preview','spasalon'); ?></a>
						</span>
						<div class="spasalon-clear"></div>
					</div>
					<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'dream-spa - Current theme', 'spasalon' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','spasalon'); ?></a>
						<div class="spasalon-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	</div>
	
	
	</div>
</div>	
	</div>