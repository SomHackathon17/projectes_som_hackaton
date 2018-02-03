<?php 
// Home page slider section

add_action( 'customize_register', 'spasalon_slider_customizer' );

function spasalon_slider_customizer( $wp_customize ){

/* slider section panel */
	$wp_customize->add_panel( 'slider_panel', array(
		'priority'       => 126,
		'capability'     => 'edit_theme_options',
		'title'      => __('Slider section', 'spasalon'),
	) );
	
	
	/* Option list of all post */	
    $options_posts = array();
    $options_posts_obj = get_posts('posts_per_page=-1');
    $options_posts[''] = __( 'Choose Post', 'spasalon' );
    foreach ( $options_posts_obj as $posts ) {
    	$options_posts[$posts->ID] = $posts->post_title;
    }
	
		/* slider section */
		$wp_customize->add_section( 'slider_section' , array(
			'title'      => __('Settings', 'spasalon'),
			'panel'  => 'slider_panel'
		) );
		
			// slider banner enable / disable 
			$wp_customize->add_setting( 'spa_theme_options[slider_bannerstrip_enable]' , array(
			'default' => 'yes',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[slider_bannerstrip_enable]' , array(
			'label'          => __( 'Slider banner enable in home page', 'spasalon' ),
			'section'        => 'slider_section',
			'type'           => 'radio',
			'choices'        => array(
				'yes' => 'ON',
				'no'  => 'OFF'
			) ) );
			
			
			// slide 1 title one
			$wp_customize->add_setting( 'spa_theme_options[line_one]' , array(
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control('spa_theme_options[line_one]' , array(
			'label'          => __( 'Banner title', 'spasalon' ),
			'section'        => 'slider_section',
			'type'           => 'text'
			) );
			
			// slide 1 title two
			$wp_customize->add_setting( 'spa_theme_options[line_two]' , array(
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control('spa_theme_options[line_two]' , array(
			'label'          => __('Banner subtitle', 'spasalon' ),
			'section'        => 'slider_section',
			'type'           => 'text'
			) );
			
			// slide desc
			$wp_customize->add_setting( 'spa_theme_options[description]' , array(
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			) );
			$wp_customize->add_control('spa_theme_options[description]' , array(
			'label'          => __('Banner description','spasalon' ),
			'section'        => 'slider_section',
			'type'           => 'textarea'
			) );
			
			
			//Select Post One
			$wp_customize->add_setting('spa_theme_options[slider_post]',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
				'type' => 'option',
			));
			
			$wp_customize->add_control('spa_theme_options[slider_post]',array(
				'label' => __('Select post','spasalon'),
				'section'=>'slider_section',
				'type'=>'select',
				'choices'=>$options_posts,
			));
			
			
			// slider thumbnail enable / disable 
			$wp_customize->add_setting( 'spa_theme_options[slider_thumbnails_enable]' , array(
			'default' => 'yes',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[slider_thumbnails_enable]' , array(
			'label'          => __( 'Slider thumbnails enable in home page', 'spasalon' ),
			'section'        => 'slider_section',
			'type'           => 'radio',
			'choices'        => array(
				'yes' => 'ON',
				'no'  => 'OFF'
			) ) );
			
			
			//Select Thumbnails Post one
			$wp_customize->add_setting('spa_theme_options[slider_thumbnail_one]',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
				'type' => 'option',
			));
			
			$wp_customize->add_control('spa_theme_options[slider_thumbnail_one]',array(
				'label' => __('Select thumbnail post','spasalon'),
				'section'=>'slider_section',
				'type'=>'select',
				'choices'=>$options_posts,
			));
			
			//Select Thumnails Post Two
			$wp_customize->add_setting('spa_theme_options[slider_thumbnail_two]',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
				'type' => 'option',
			));
			
			$wp_customize->add_control('spa_theme_options[slider_thumbnail_two]',array(
				'label' => __('Select thumbnail post','spasalon'),
				'section'=>'slider_section',
				'type'=>'select',
				'choices'=>$options_posts,
			));
			
			//Select Thumnails Post Three
			$wp_customize->add_setting('spa_theme_options[slider_thumbnail_three]',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
				'type' => 'option',
			));
			
			$wp_customize->add_control('spa_theme_options[slider_thumbnail_three]',array(
				'label' => __('Select thumbnail post','spasalon'),
				'section'=>'slider_section',
				'type'=>'select',
				'choices'=>$options_posts,
			));
			
			
			class WP_btn_slider_Customize_Control extends WP_Customize_Control {
				
				public $type = 'new_menu';
				public function render_content() {
				?>
				<p>
				<a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php" class="button"  target="_blank"><?php _e( 'Click here to add slides', 'spasalon' ); ?></a>
				</p>
				<?php
				}
			}
			
			$wp_customize->add_setting('btn_slider',	array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
			) );
			
			$wp_customize->add_control( new WP_btn_slider_Customize_Control( $wp_customize, 'btn_slider', array(	
				'section' => 'slider_section',
			) )	);
	
}


// customizer service section settings

function spasalon_service_section_customizer( $wp_customize ){
	
	/* service panel */
	
	$wp_customize->add_panel( 'service_panel', array(
		'priority'       => 127,
		'capability'     => 'edit_theme_options',
		'title'      => __('Service section', 'spasalon'),
	) );
		

		$wp_customize->add_section( 'service_settings' , array(
			'title'      => __('Settings', 'spasalon'),
			'panel'  => 'service_panel',
			'priority'       => 1,
		) );
		
			// service hide
			$wp_customize->add_setting( 'spa_theme_options[service_hide]' , array(
			'default' => false,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[service_hide]' , array(
			'label'          => __('Hide service section', 'spasalon' ),
			'section'        => 'service_settings',
			'type'           => 'checkbox'
			) );
			
			// service layout
			$wp_customize->add_setting( 'spa_theme_options[service_layout]' , array(
			'default' => 4,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[service_layout]' , array(
			'label'          => __('Select column layout','spasalon' ),
			'section'        => 'service_settings',
			'type'           => 'select',
			'choices' => array(
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
			) ) );
		
		$wp_customize->add_section( 'service_section' , array(
			'title'      => __('Section Header', 'spasalon'),
			'panel'  => 'service_panel',
			'priority'       => 2,
		) );
		
			// service title
			$wp_customize->add_setting( 'spa_theme_options[tagline_title]' , array(
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[tagline_title]' , array(
			'label'          => __('Title', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'text'
			) );
			
			// service desc
			$wp_customize->add_setting( 'spa_theme_options[tagline_contents]' , array(
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			) );
			$wp_customize->add_control('spa_theme_options[tagline_contents]' , array(
			'label'          => __('Description', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'textarea'
			) );
}

add_action( 'customize_register', 'spasalon_service_section_customizer' );





// customizer project settings

add_action( 'customize_register', 'spasalon_project_section_customizer' );

function spasalon_project_section_customizer( $wp_customize ){
	
	/* project panel */
	$wp_customize->add_panel( 'project_panel', array(
		'priority'       => 128,
		'capability'     => 'edit_theme_options',
		'title'      => __('Product section', 'spasalon'),
	) );
		
		/* settings */
		$wp_customize->add_section( 'project_settings' , array(
			'title'      => __('Settings', 'spasalon'),
			'panel'  => 'project_panel',
			'priority'       => 1,
		) );
		
			// project hide
			$wp_customize->add_setting( 'spa_theme_options[project_hide]' , array(
			'default' => false,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			
			$wp_customize->add_control('spa_theme_options[project_hide]' , array(
			'label'          => __( 'Hide Product section', 'spasalon' ),
			'section'        => 'project_settings',
			'type'           => 'checkbox'
			) );
			
		
		/* project section */
		$wp_customize->add_section( 'project_section' , array(
			'title'      => __('Section Header', 'spasalon'),
			'panel'  => 'project_panel',
			'priority'       => 2,
		) );
		
			// project title
			$wp_customize->add_setting( 'spa_theme_options[product_title]' , array(
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			'type'=>'option'
			) );
			
			$wp_customize->add_control('spa_theme_options[product_title]' , array(
			'label'          => __( 'Title', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'text'
			) );
			
			// project desc
			$wp_customize->add_setting( 'spa_theme_options[product_contents]' , array(
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			
			) );
			
			$wp_customize->add_control('spa_theme_options[product_contents]' , array(
			'label'          => __( 'Description', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'textarea'
			) );
}





// customizer news settings

function spasalon_news_customizer( $wp_customize ){
	
	/* home page settings */
	$wp_customize->add_panel( 'news_panel', array(
		'priority'       => 129,
		'capability'     => 'edit_theme_options',
		'title'      => __('News section', 'spasalon'),
	) );
		
		/* settings */
		$wp_customize->add_section( 'news_settings' , array(
			'title'      => __('Settings', 'spasalon'),
			'panel'  => 'news_panel',
			'priority'       => 1,
		) );
			
			// news enable / disable 
			$wp_customize->add_setting( 'spa_theme_options[enable_news]' , array(
			'default' => true,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			
			$wp_customize->add_control('spa_theme_options[enable_news]' , array(
			'label'          => __( 'Enable News Section', 'spasalon' ),
			'section'        => 'news_settings',
			'type'           => 'checkbox',
			) );
			
			// news layout
			$wp_customize->add_setting( 'spa_theme_options[news_layout]' , array(
			'default' => 2,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[news_layout]' , array(
			'label'          => __('Select column layout', 'spasalon' ),
			'section'        => 'news_settings',
			'type'           => 'select',
			'choices' => array(
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
			) ) );
			
		/* news section header */
		$wp_customize->add_section( 'news_section' , array(
			'title'      => __('News Header', 'spasalon'),
			'panel'  => 'news_panel',
			'priority'       => 2,
		) );
			
			// news title
			$wp_customize->add_setting( 'spa_theme_options[news_title]' , array(
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[news_title]' , array(
			'label'          => __( 'Title', 'spasalon' ),
			'section'        => 'news_section',
			'type'           => 'text'
			) );
			
			// news desc
			$wp_customize->add_setting( 'spa_theme_options[news_contents]' , array(
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			
			) );
			$wp_customize->add_control('spa_theme_options[news_contents]' , array(
			'label'          => __( 'Description', 'spasalon' ),
			'section'        => 'news_section',
			'type'           => 'textarea'
			) );
}
add_action( 'customize_register', 'spasalon_news_customizer' );

function spasalon_home_page_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

			}