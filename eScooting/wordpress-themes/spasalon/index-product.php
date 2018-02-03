<?php
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );

if( $current_options['project_hide'] != true ):
?>
<!-- Products Section -->
<section id="section" class="products bg-color">
	<div class="container">
	
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					
					<?php 
						if( $current_options['product_title'] != '' ):
					?>
					<h1 class="section-title">
						<?php echo $current_options['product_title'] ?>
					</h1>
					<?php endif; ?>
					
					<?php 
						if( $current_options['product_contents'] != '' ):
					?>
					<p class="section-subtitle">
						<?php echo $current_options['product_contents'] ?>
					</p>
					<?php endif; ?>
					
				</div>
			</div>
		</div>	
		
		<?php if( is_active_sidebar('sidebar-project') ): ?>
		
		<div class="row">
		 	<?php dynamic_sidebar('sidebar-project'); ?>
		</div>
		<?php else: ?>
		<div class="col-md-12 col-xs-12">
			<div class="product">
				<div class="clearfix"></div>
				<?php for( $i=1; $i<=5; $i++ ){ ?>
					<aside class="item-product">
						<figure class="item">
						<?php if( $current_options['product'.$i.'_image'] != '' ){ ?>
							<img src="<?php echo esc_url($current_options['product'.$i.'_image']); ?>" alt="Product <?php echo $i; ?>">
						<?php } ?>
						</figure>
						<div class="product-info">
							
							<?php if( $current_options['product'.$i.'_title'] != '' ){ ?>
							<h4><?php echo esc_attr($current_options['product'.$i.'_title']); ?></h4>
							<?php } ?>
						<label class="product-description">	
							<?php if( $current_options['product'.$i.'_desc'] != '' ){ ?>
							<p><?php echo esc_attr($current_options['product'.$i.'_desc']); ?></p>
							<?php } ?>
						</label>	
						</div>
					</aside>
				<?php } ?>
			</div>
		</div>
		<?php endif; ?>	
	</div>
</section>
<!-- End of Products Section -->

<div class="clearfix"></div>

<?php endif; ?>