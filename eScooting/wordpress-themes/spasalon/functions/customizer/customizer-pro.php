<?php
//Pro Button

function spasalon_pro_customizer( $wp_customize ) {

//View Demo Link
class WP_demo_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	  <div class="pro-box">
     <a href="<?php echo esc_url('http://webriti.com/demo/wp/spasalon/');?>" target="_blank" class="demo" id="review_pro"><?php _e('View Demo','spasalon' ); ?></a>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'demo_Review',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_demo_Customize_Control( $wp_customize, 'demo_Review', array(	
		'section' => 'spasalon_pro_section',
		'setting' => 'demo_Review',
    ))
);



class WP_Pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-box">
       <a href="<?php echo esc_url('http://webriti.com/spasalon/');?>" target="_blank" class="upgrade" id="review_pro"><?php _e('Upgrade to pro','spasalon' ); ?></a>
		
	</div>
    <?php
    }
}
$wp_customize->add_section( 'spasalon_pro_section' , array(
		'title'      => __('Upgrade to pro', 'spasalon'),
		'priority'   => 1150,
   	) );

$wp_customize->add_setting(
    'upgrade_pro',
    array(
       'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Pro_Customize_Control( $wp_customize, 'upgrade_pro', array(
		'section' => 'spasalon_pro_section',
		'setting' => 'upgrade_pro',
    ))
);


class WP_Review_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	  <div class="pro-box">
     <a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/spasalon#postform/');?>" target="_blank" class="review" id="review_pro"><?php _e('ADD YOUR REVIEW','spasalon' ); ?></a>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'pro_Review',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Review_Customize_Control( $wp_customize, 'pro_Review', array(	
		'section' => 'spasalon_pro_section',
		'setting' => 'pro_Review',
    ))
);



class WP_document_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
	 <a href="<?php echo esc_url('http://webriti.com/help/');?>" target="_blank" class="document" id="review_pro"><?php _e( 'DOCUMENTATION','spasalon' ); ?></a>
	 
	 <div>
	 <div class="pro-vesrion">
	 <?php _e('The Pro Version gives you more opportunities to enhance your site and business. In order to create effective online presence one have to showcase their wide range of products, have to use contact us enquiry form, have to make effective about us page, have to introduce team members, etc etc . The pro version will give it all. Buy the pro version and give us a chance to serve you better.','spasalon');?>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'doc_Review',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_document_Customize_Control( $wp_customize, 'doc_Review', array(	
		'section' => 'spasalon_pro_section',
		'setting' => 'doc_Review',
    ))
);

}
add_action( 'customize_register', 'spasalon_pro_customizer' );
?>