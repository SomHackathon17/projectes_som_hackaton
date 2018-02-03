<?php
/**
 * 404 template file
 * @package WordPress
 * @subpackage spasalon
 */
 
get_header(); 
spasalon_page_banner_strip(); // banner strip
?>

<!-- Blog & Sidebar Section -->
<section id="section">		
	<div class="container">
		<div class="row">
			
			<!--Blog Detail-->
			<div class="col-md-8 col-xs-12">
				<div class="site-content">
					<h3 class="entry-title"><?php _e('Oops! Page not found','spasalon'); ?></h3>
					
					<h1 class="error_404"><?php echo '4'; ?><i class="fa fa-frown-o"></i><?php echo '4'; ?> </h1>
					
					<p><?php _e ('We are sorry, but the page you are looking for does not exist.','spasalon'); ?> <a href="<?php echo esc_html(site_url());?>"><?php _e('Go Back','spasalon'); ?></a></p>	
					
				</div>
			</div>
			<!--/End of Blog Detail-->

			<?php get_sidebar(); ?>
		
		</div>	
	</div>
</section>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer(); ?>