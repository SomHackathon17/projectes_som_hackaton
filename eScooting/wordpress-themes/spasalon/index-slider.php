<?php
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
$call_us = $current_options['call_us'];
$slider_bannerstrip_enable = $current_options['slider_bannerstrip_enable'];
?>
<!-- Slider with Thumbnails -->
<div id="main" role="main">
	<section class="slider">
		<div id="slider">
			<ul class="slides">
					<?php 	
						$slider_post_one = $current_options['slider_post'];
						$slider_post = array($slider_post_one);
						if( $current_options['slider_post']!='' ){ 
						$slider_query = new WP_Query( array( 'post__in' => $slider_post));
							if( $slider_query->have_posts() ){                
								while( $slider_query->have_posts() ){
									$slider_query->the_post();		
						$defalt_arg =array('class' => "img-responsive");
						if( has_post_thumbnail() ){  the_post_thumbnail('', $defalt_arg);  } } } 
						} else { 
						if($current_options['home_feature']  !='') {
						?>
						<img alt="slide1" src="<?php echo esc_url($current_options['home_feature']); ?>"/>	
						<?php } } ?>
						<?php if( $current_options['slider_bannerstrip_enable'] == 'yes' ) { ?>
					<div class="container topbar-detail">
						<div class="col-md-3">
							<div class="title">
								<h4><?php if( isset( $current_options['line_one'] ) ){ echo $current_options['line_one']; } ?></h4>
								<h1><?php if( isset( $current_options['line_two'] ) ){ echo $current_options['line_two']; } ?></h1>
							</div>
						</div>
						<div class="col-md-6">
							<p class="description">
								<?php if( isset( $current_options['description'] ) ){ echo $current_options['description']; } ?>
							</p>
						</div>
						<div class="col-md-3"><div class="addr-detail"><address><?php echo esc_attr($current_options['call_us_text']); ?> <strong><?php echo esc_attr($call_us); ?></strong></address></div></div>
					</div>
					<?php } ?>
				<?php 
				?>
			</ul>
		</div>
		<?php if( $current_options['slider_thumbnails_enable'] == 'yes' ) : ?>
		<div class="container thumb-caption-detail">
			<div class="row">
				<div id="carousel">
					<div class="slider-thumb-container container padding-none">
						<div class="thumb-img-container">
							<?php 	
							$slider_post_thumbnail_one = $current_options['slider_thumbnail_one'];
							$slider_thumbnail_one = array($slider_post_thumbnail_one);
							if( $current_options['slider_thumbnail_one']!='' ){ 
							$slider_query = new WP_Query( array( 'post__in' => $slider_thumbnail_one));
							if( $slider_query->have_posts() ){ 
							while( $slider_query->have_posts() ){
									$slider_query->the_post();	
							$defalt_arg =array('class' => "img-responsive");
							if( has_post_thumbnail() ){  the_post_thumbnail('', $defalt_arg);  } } } }
							else {  if($current_options['first_thumb_image']!='')  ?>
							<img src="<?php echo $current_options['first_thumb_image']; ?>"  alt="Spa Featture" class="slider-thumb" />
							<?php } ?>
						</div>
						<div class="thumb-img-container">
							<?php 	
							$slider_post_thumbnail_two = $current_options['slider_thumbnail_two'];
							$slider_thumbnail_two = array($slider_post_thumbnail_two);
							if( $current_options['slider_thumbnail_two']!='' ){ 
							$slider_query = new WP_Query( array( 'post__in' => $slider_thumbnail_two));
							if( $slider_query->have_posts() ){ 
							while( $slider_query->have_posts() ){
									$slider_query->the_post();		
							$defalt_arg =array('class' => "img-responsive");
							if( has_post_thumbnail() ){  the_post_thumbnail('', $defalt_arg);  } } } } 
							else {  	if($current_options['second_thumb_image']!='')  ?>
							<img src="<?php echo $current_options['second_thumb_image']; ?>"  alt="Spa Featture" class="slider-thumb" />
							<?php } ?>
						</div>
						<div class="thumb-img-container">
							<?php 	
							$slider_post_thumbnail_three = $current_options['slider_thumbnail_three'];
							$slider_thumbnail_three = array($slider_post_thumbnail_three);
							if( $current_options['slider_thumbnail_three']!='' ){ 
							$slider_query = new WP_Query( array( 'post__in' => $slider_thumbnail_three));
							if( $slider_query->have_posts() ){ 
							while( $slider_query->have_posts() ){
									$slider_query->the_post();		
							$defalt_arg =array('class' => "img-responsive");
							if( has_post_thumbnail() ){  the_post_thumbnail('', $defalt_arg);  } } } } 
							else { ?>
							<?php 	if($current_options['third_thumb_image']!='')  ?>
							<img src="<?php echo $current_options['third_thumb_image']; ?>"  alt="Spa Featture" class="slider-thumb" />
							<?php } ?>
						</div>
					</div>				
				</div>
			</div>
		</div>
		<?php endif; ?>
	</section>
</div>
<!-- End of Slider with Thumbnails -->
<div class="clearfix"></div>