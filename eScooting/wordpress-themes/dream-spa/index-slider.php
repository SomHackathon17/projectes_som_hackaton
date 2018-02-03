<?php
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), dream_spa_default_data() );
?>
<!-- Slider with Thumbnails -->
<div id="main" role="main">
	<section class="slider">
		<div id="slider">
			<ul class="slides">
					<?php 	
						$slider_post_one = $current_options['dreamspa_slider_post'];
						$dreamspa_slider_post = array($slider_post_one);
						if( $current_options['dreamspa_slider_post']!='' ){ 
						$slider_query = new WP_Query( array( 'post__in' => $dreamspa_slider_post));
							if( $slider_query->have_posts() ){                
								while( $slider_query->have_posts() ){
									$slider_query->the_post();		
						$defalt_arg =array('class' => "img-responsive");
						if( has_post_thumbnail() ){  the_post_thumbnail('', $defalt_arg);  } } } 
						} ?>
						<div class="container caption-overlay text-<?php echo $current_options['slider_caption_align']; ?>">
						<?php 
						the_title( '<h1 class="slider_txt">','</h1>'); 
						?>
						<div class="txt">
						
							<?php 
							
							the_content(__('Read More','dream-spa'));
							
							?>
						</div>
						
				</div>
			</ul>
		</div>
	</section>
</div>
<!-- End of Slider with Thumbnails -->
<div class="clearfix"></div>