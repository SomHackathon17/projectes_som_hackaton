<?php 
// Home page slider section

add_action( 'customize_register', 'dream_spa_slider_customizer' );

function dream_spa_slider_customizer( $wp_customize ){

/* slider section panel */
	$wp_customize->add_panel( 'dreamspa_slider_panel', array(
		'priority'       => 126,
		'capability'     => 'edit_theme_options',
		'title'      => __('Slider Section', 'dream-spa'),
	) );
	
	
	/* Option list of all post */	
    $options_posts = array();
    $options_posts_obj = get_posts('posts_per_page=-1');
    $options_posts[''] = __( 'Choose Post', 'dream-spa' );
    foreach ( $options_posts_obj as $posts ) {
    	$options_posts[$posts->ID] = $posts->post_title;
    }
	
	/* slider section */
	$wp_customize->add_section( 'dreamspa_slider_section' , array(
			'title'      => __('Settings', 'dream-spa'),
			'panel'  => 'dreamspa_slider_panel'
		) );
		
		
		//Select Post One
		$wp_customize->add_setting('spa_theme_options[dreamspa_slider_post]',array(
			'capability'=>'edit_theme_options',
			'sanitize_callback'=>'sanitize_text_field',
			'type' => 'option',
		));
		
		$wp_customize->add_control('spa_theme_options[dreamspa_slider_post]',array(
			'label' => __('Select Post','dream-spa'),
			'section'=>'dreamspa_slider_section',
			'type'=>'select',
			'choices'=>$options_posts,
		));
		
		// slider caption align
			$wp_customize->add_setting( 'spa_theme_options[slider_caption_align]' , array(
			'default' => 'left',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[slider_caption_align]' , array(
			'label'          => __( 'Slider caption alignment', 'dream-spa' ),
			'section'        => 'dreamspa_slider_section',
			'type'           => 'select',
			'choices'        => array(
				'left' => 'left',
				'right' => 'right',
				'center' => 'center',
			) ) );
			
			
			// slider caption color
			$wp_customize->add_setting( 'spa_theme_options[slider_caption_title_color]' , array(
			'default'     => '#fff',
				'type'=>'option',
				'sanitize_callback' => 'sanitize_text_field',
				)
			);
 
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'spa_theme_options[slider_caption_title_color]',
					array(
						'label'      => __( 'Slider Caption Title Color', 'dream-spa' ),
						'section'    => 'dreamspa_slider_section',
						'settings'   => 'spa_theme_options[slider_caption_title_color]'
					)
				)
			);
			
			
			$wp_customize->add_setting( 'spa_theme_options[slider_caption_overlay_color]' , array(
			'default'     => '#fff',
				'type'=>'option',
				'sanitize_callback' => 'sanitize_text_field',
				)
			);
 
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'spa_theme_options[slider_caption_overlay_color]',
					array(
						'label'      => __( 'Slider Caption Description Color', 'dream-spa' ),
						'section'    => 'dreamspa_slider_section',
						'settings'   => 'spa_theme_options[slider_caption_overlay_color]'
					)
				)
			);
			
			
			class WP_dream_spa_btn_slider_Customize_Control extends WP_Customize_Control {
				
				public $type = 'new_menu';
				public function render_content() {
				?>
				<p>
				<a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php" class="button"  target="_blank"><?php _e( 'Click here to add slides', 'dream-spa' ); ?></a>
				</p>
				<?php
				}
			}
			
			$wp_customize->add_setting('dream_spa_btn_slider',	array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
			) );
			
			$wp_customize->add_control( new WP_dream_spa_btn_slider_Customize_Control( $wp_customize, 'dream_spa_btn_slider', array(	
					'label' => __('Discover spasalon Pro','dream-spa'),
					'section' => 'dreamspa_slider_section',
			) )	);	
}