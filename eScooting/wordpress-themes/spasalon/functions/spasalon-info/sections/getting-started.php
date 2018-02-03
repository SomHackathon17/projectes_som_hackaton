<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="spasalon-tab-pane active">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="spasalon-info-title text-center"><?php echo __('About Spasalon Lite Theme','spasalon'); ?><?php if( !empty($spasalon['Version']) ): ?> <sup id="spasalon-theme-version"><?php echo esc_attr( $spasalon['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">
				<p><?php esc_html_e( 'SpaSalon is a responsive multipurpose WordPress theme best suitable for beauty industry like Cosmetology, Hair Styling, Spa, Beauty Salon, Massage & Therapy Center and Beauty Care website. Theme is not only limited to beauty sector rather you can use it for any type of business.','spasalon');?></p>

				<p><?php esc_html_e( 'Packed with everything you need to launch your site hassle free! Powerful and user friendly Customize Theme Options, Sidebar enabled HomePage Sections having support for all the WordPress core widgets. Premium theme is packed with many widgets like Service Page Widget, Product Widget, Team Widget, Latest News Widget and Contact Widget etc ','spasalon');?></p>
				
				<p>
				<?php esc_html_e( 'Premium version even allows you to configure the layout of sidebars, for example if you want to show Services, Products, Latest News and Team than you are not required to add any css of php code just specify the section layout and get the desired result. Theme also support famous Page Builders since number of widgets are built in. ', 'spasalon' ); ?>
				</p>
				<b>
				<p>
				<?php esc_html_e( 'Note: Intresting fact about this theme is, after upgrade you can start from where you have left in the lite version. You have to install the premium version as a separate package like any other WordPress Theme.', 'spasalon' ); ?>
				</p>
				</b>
				</div>
			</div>
			<div class="col-md-6">
				<div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/functions/spasalon-info/img/spasalon.png'; ?>" alt="<?php esc_html_e( 'spasalon Blue Child Theme', 'spasalon' ); ?>" />
				</div>
			</div>	
		</div>
	
	
		 <div class="row">
		 
			<div class="spasalon-tab-center">

				<h1><?php esc_html_e( "Useful Links", 'spasalon' ); ?></h1>

			</div>
			
			<div class="col-md-6"> 
				<div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">

					<a href="<?php echo esc_url('http://webriti.com/demo/wp/lite/spasalon/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
					<p class="info-text"><?php echo __('Lite Demo','spasalon'); ?></p></a>
					
					
					<a href="<?php echo esc_url('http://webriti.com/demo/wp/preview/?prev=spasalon/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
					<p class="info-text"><?php echo __('View Pro','spasalon'); ?></p></a>
					
					<a href="<?php echo esc_url('http://webriti.com/support/categories/spasalon'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-sos info-icon"></div>
					<p class="info-text"><?php echo __('Premium Theme Support','spasalon'); ?></p></a>
					
				</div>
			</div>
			
			<div class="col-md-6">	
				<div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">
					
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/spasalon/reviews/#new-post'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-smiley info-icon"></div>
					<p class="info-text"><?php echo __('Rate This Theme','spasalon'); ?></p></a>
					
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/spasalon'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-sos info-icon"></div>
					<p class="info-text"><?php echo __('Support','spasalon'); ?></p></a>
				</div>
			</div>
			
		</div>	
	</div>
</div>	