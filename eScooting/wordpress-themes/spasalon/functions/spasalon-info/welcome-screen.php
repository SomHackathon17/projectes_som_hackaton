<?php
/**
 * Welcome Screen Class
 */
class spasalon_screen {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'spasalon_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'spasalon_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'spasalon_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'spasalon_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'spasalon_info_screen', array( $this, 'spasalon_getting_started' ), 	    10 );
		add_action( 'spasalon_info_screen', array( $this, 'spasalon_action_required' ), 	    20 );
		add_action( 'spasalon_info_screen', array( $this, 'spasalon_child_themes' ), 		    30 );
		add_action( 'spasalon_info_screen', array( $this, 'spasalon_upgrade' ), 		        40 );
		add_action( 'spasalon_info_screen', array( $this, 'spasalon_welcome_free_pro' ), 		50 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_spasalon_dismiss_required_action', array( $this, 'spasalon_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_spasalon_dismiss_required_action', array($this, 'spasalon_dismiss_required_action_callback') );

	}

	public function spasalon_register_menu() {
		add_theme_page( 'About Spasalon Theme', 'About Spasalon Theme', 'activate_plugins', 'spasalon-info', array( $this, 'hc_welcome_screen' ) );
	}

	public function spasalon_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'spasalon_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function spasalon_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Spasalon! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'spasalon' ), '<a href="' . esc_url( admin_url( 'themes.php?page=spasalon-info' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=spasalon-info' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Spasalon', 'spasalon' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @sfunctionse  1.8.2.4
	 */
	public function spasalon_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_spasalon-info' == $hook_suffix ) {
			
			
			wp_enqueue_style( 'spasalon-info-css', get_template_directory_uri() . '/functions/spasalon-info/css/bootstrap.css' );
			
			wp_enqueue_style( 'spasalon-info-screen-css', get_template_directory_uri() . '/functions/spasalon-info/css/welcome.css' );

			wp_enqueue_script( 'spasalon-info-screen-js', get_template_directory_uri() . '/functions/spasalon-info/js/welcome.js', array('jquery') );

			global $spasalon_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('spasalon_show_required_actions') ):
				$spasalon_show_required_actions = get_option('spasalon_show_required_actions');
			else:
				$spasalon_show_required_actions = array();
			endif;

			if( !empty($spasalon_required_actions) ):
				foreach( $spasalon_required_actions as $spasalon_required_action_value ):
					if(( !isset( $spasalon_required_action_value['check'] ) || ( isset( $spasalon_required_action_value['check'] ) && ( $spasalon_required_action_value['check'] == false ) ) ) && ((isset($spasalon_show_required_actions[$spasalon_required_action_value['id']]) && ($spasalon_show_required_actions[$spasalon_required_action_value['id']] == true)) || !isset($spasalon_show_required_actions[$spasalon_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'spasalon-info-screen-js', 'spasalonLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','spasalon' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @sfunctionse  1.8.2.4
	 */
	public function spasalon_scripts_for_customizer() {

		wp_enqueue_style( 'spasalon-info-screen-customizer-css', get_template_directory_uri() . '/functions/spasalon-info/css/welcome_customizer.css' );
		wp_enqueue_script( 'spasalon-info-screen-customizer-js', get_template_directory_uri() . '/functions/spasalon-info/js/welcome_customizer.js', array('jquery'), '20120206', true );

		global $spasalon_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('spasalon_show_required_actions') ):
			$spasalon_show_required_actions = get_option('spasalon_show_required_actions');
		else:
			$spasalon_show_required_actions = array();
		endif;

		if( !empty($spasalon_required_actions) ):
			foreach( $spasalon_required_actions as $spasalon_required_action_value ):
				if(( !isset( $spasalon_required_action_value['check'] ) || ( isset( $spasalon_required_action_value['check'] ) && ( $spasalon_required_action_value['check'] == false ) ) ) && ((isset($spasalon_show_required_actions[$spasalon_required_action_value['id']]) && ($spasalon_show_required_actions[$spasalon_required_action_value['id']] == true)) || !isset($spasalon_show_required_actions[$spasalon_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'spasalon-info-screen-customizer-js', 'spasalonLiteWelcomeScreenObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=spasalon-info#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','spasalon'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @sfunctionse 1.8.2.4
	 */
	public function spasalon_dismiss_required_action_callback() {

		global $spasalon_required_actions;

		$spasalon_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $spasalon_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($spasalon_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('spasalon_show_required_actions') ):

				$spasalon_show_required_actions = get_option('spasalon_show_required_actions');

				$spasalon_show_required_actions[$spasalon_dismiss_id] = false;

				update_option( 'spasalon_show_required_actions',$spasalon_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$spasalon_show_required_actions_new = array();

				if( !empty($spasalon_required_actions) ):

					foreach( $spasalon_required_actions as $spasalon_required_action ):

						if( $spasalon_required_action['id'] == $spasalon_dismiss_id ):
							$spasalon_show_required_actions_new[$spasalon_required_action['id']] = false;
						else:
							$spasalon_show_required_actions_new[$spasalon_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'spasalon_show_required_actions', $spasalon_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @sfunctionse 1.8.2.4
	 */
	public function hc_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>
		<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<ul class="spasalon-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting Started','spasalon'); ?></a></li>
			<li role="presentation"><a href="#actions_required" aria-controls="actions_required" role="tab" data-toggle="tab"><?php esc_html_e( 'Actions Required','spasalon'); ?></a></li>
			<li role="presentation"><a href="#upgrade" aria-controls="upgrade" role="tab" data-toggle="tab"><?php esc_html_e( 'Why Upgrade Pro','spasalon'); ?></a></li>
			<li role="presentation"><a href="#free_pro" aria-controls="free_pro" role="tab" data-toggle="tab"><?php esc_html_e( 'Free VS PRO','spasalon'); ?></a></li>
			<li role="presentation"><a href="#child_themes" aria-controls="child_themes" role="tab" data-toggle="tab"><?php esc_html_e( 'Child Themes','spasalon'); ?></a></li>
			
		</ul>
		</div>
		</div>
		</div>

		<div class="spasalon-tab-content">

			<?php do_action( 'spasalon_info_screen' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 *
	 */
	public function spasalon_getting_started() {
		require_once( get_template_directory() . '/functions/spasalon-info/sections/getting-started.php' );
	}

	
	/**
	 * Action Requerd
	 *
	 */
	public function spasalon_action_required() {
		require_once( get_template_directory() . '/functions/spasalon-info/sections/actions-required.php' );
	}
	
	/**
	 * Child themes
	 *
	 */
	public function spasalon_child_themes() {
		require_once( get_template_directory() . '/functions/spasalon-info/sections/child-themes.php' );
	}

	/**
	 * Contribute
	 *
	 */
	public function spasalon_upgrade() {
		require_once( get_template_directory() . '/functions/spasalon-info/sections/upgrade.php' );
	}


	/**
	 * Free vs PRO
	 * 
	 */
	public function spasalon_welcome_free_pro() {
		require_once( get_template_directory() . '/functions/spasalon-info/sections/free_pro.php' );
	}
}

$GLOBALS['spasalon_screen'] = new spasalon_screen();