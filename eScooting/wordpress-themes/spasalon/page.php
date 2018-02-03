<?php
/**
 * single page detail file
 * @package WordPress
 * @subpackage spasalon
 */
 
get_header(); 
$my_meta = get_post_meta( get_the_ID() ,'_my_meta', TRUE );
if( isset($my_meta['banner_enable'])==true ) {
spasalon_page_banner_strip();
}
else
{
spasalon_pink_banner_strip(); // banner strip
}
?>

<!-- Blog & Sidebar Section -->
<section id="section">		
	<div class="container">
		<div class="row">
			
			<!--Blog Detail-->
			<?php 
				if ( class_exists( 'WooCommerce' ) ) {
					
					if( is_account_page() || is_cart() || is_checkout() ) {
							echo '<div class="col-md-'.( !is_active_sidebar( "woocommerce-1" ) ?"12" :"8" ).'">'; 
					}
					else{ 
				
					echo '<div class="col-md-'.( !is_active_sidebar( "sidebar-primary" ) ?"12" :"8" ).'">'; 
					
					}
					
				}
				else{ 
				
					echo '<div class="col-md-'.( !is_active_sidebar( "sidebar-primary" ) ?"12" :"8" ).'">';
					
					} ?>
				<div class="site-content">
					
					<?php while( have_posts() ): the_post(); ?>
						
						<?php get_template_part('content','page'); ?>
						
						<?php 
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
						?>
					
					<?php endwhile; ?>
			
				</div>
			</div>
			<!--/End of Blog Detail-->

			<?php 
				if ( class_exists( 'WooCommerce' ) ) {
					
					if( is_account_page() || is_cart() || is_checkout() ) {
							get_sidebar('woocommerce'); 
					}
					else{ 
				
					get_sidebar(); 
					
					}
					
				}
				else{ 
				
					get_sidebar(); 
					
					} ?>
		
		</div>	
	</div>
</section>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer(); ?>