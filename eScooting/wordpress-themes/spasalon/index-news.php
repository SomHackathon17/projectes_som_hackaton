<?php
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
$news_layout = 12 / $current_options['news_layout'];

if( $current_options['enable_news'] == true ):
?>
<!-- Blog Section -->
<section id="section" class="home-post">
	<div class="container">
		
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					
					<?php if( $current_options['news_title'] != '' ): ?>
					<h1 class="section-title">
						<?php echo $current_options['news_title']; ?>
					</h1>
					<?php endif; ?>
					
					<?php if( $current_options['news_contents'] != '' ): ?>
					<p class="section-subtitle">
						<?php echo $current_options['news_contents']; ?>
					</p>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		<!-- /Section Title -->	
		
		
		<?php if( is_active_sidebar('sidebar-news') ): ?>
		
		<div class="row">
		
			<?php dynamic_sidebar('sidebar-news'); ?>
			
		</div>
		
		<?php else: ?>
			
			<!-- Blog Post -->	
			<div class="row">
				
				<?php 
				
				$i = 1;
				
				$cat_id = $current_options['blog_selected_category_id'];
				$no_of_post = $current_options['posts_per_page'];
				
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				
				$args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , 'category__in' => $cat_id, 'posts_per_page' => $no_of_post,'paged' => $paged );
				
				$post_type_data = new WP_Query( $args );
				
				if( $post_type_data->have_posts() ):
				
					while( $post_type_data ->have_posts() ): $post_type_data ->the_post();
				?>
				<div class="col-md-<?php echo $news_layout; ?>">
					<article class="post">
					
						<figure class="post-thumbnail">
							<span class="entry-date">
								<div class="date"><?php echo get_the_date('j'); ?> 
									<div class="month-year">
										<?php echo get_the_date('M'); ?>
									</div>
								</div>
							</span>
							
							<?php 
								if( has_post_thumbnail() ): 
									the_post_thumbnail(); 
								endif;
							?>
						</figure>
						
						<div class="entry-header">
							<h4 class="entry-title">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h4>
						</div>
						
						<div class="entry-content">
							<?php the_content( __('Read More','spasalon') ); ?>
						</div>
						
					</article>	
				</div>
				
				<?php 
				if($i==$current_options['news_layout'])
				{ 
					echo '<div class="clearfix"></div>';
					$i=0;
				}
				 
				$i++;
				  
				endwhile;

				endif;
				?>
				
			<!-- /Blog Post -->	
			</div>
		
		<?php endif; ?>
		
		
	</div>
</section>
<!-- End of Blog Section -->

<div class="clearfix"></div>
<?php endif; ?>