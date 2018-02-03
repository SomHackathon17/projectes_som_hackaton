<?php 
add_action( 'widgets_init','wdl_post_widget'); 
function wdl_post_widget() 
{ 
	return   register_widget( 'wdl_post_widget' );
}

class wdl_post_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'wdl_post_widget', // Base ID
			__('WBR : Latest Posts', 'spasalon'), // Name
			array( 'description' => __( 'Latest Post Widget', 'spasalon' ), ) // Args
		);
	}

	public function widget( $args , $instance ) {
		
		echo $args['before_widget'];
		
		if($instance['title']){
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		}
		
		$loop = new WP_Query(array( 'post_type' => 'post', 'showposts' => $instance['post_show'] ));
		
		if( $loop->have_posts() ) :
		
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<div class="media post">
				<a href="<?php the_permalink(); ?>" class="post-thumbnail" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
				<div class="media-body">
					<div class="entry-header">
						<h5 class="entry-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h5>
					</div>
					<span class="entry-date"><?php echo  get_the_date( 'M j,Y' ); ?></span>
				</div>
			</div>
			<?php
			endwhile;
		
		endif;
		
		echo $args['after_widget']; 	
	}

	public function form( $instance ) {
		
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['post_show'] = ( isset($instance['post_show'] ) ? $instance['post_show'] : 3 );
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','spasalon' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'post_show' ); ?>"><?php _e('No posts to show','spasalon' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'post_show' ); ?>" name="<?php echo $this->get_field_name( 'post_show' ); ?>" type="text" value="<?php echo esc_attr( $instance['post_show'] ); ?>" />
		</p>
		
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		$instance['post_show'] = ( ! empty( $new_instance['post_show'] ) ) ? $new_instance['post_show'] : '';
		
		return $instance;
	}

} // class