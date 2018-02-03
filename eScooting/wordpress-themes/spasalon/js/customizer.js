jQuery(document).ready(function() {
	
	/* service panel */
	wp.customize.section( 'sidebar-widgets-sidebar-service' ).panel( 'service_panel' );
	wp.customize.section( 'sidebar-widgets-sidebar-service' ).priority( '3' );
	
	/* project panel */
	wp.customize.section( 'sidebar-widgets-sidebar-project' ).panel( 'project_panel' );
	wp.customize.section( 'sidebar-widgets-sidebar-project' ).priority( '3' );
	
	/* news panel */
	wp.customize.section( 'sidebar-widgets-sidebar-news' ).panel( 'news_panel' );
	wp.customize.section( 'sidebar-widgets-sidebar-news' ).priority( '3' );
	
	/* additional panel */
	wp.customize.section( 'sidebar-widgets-sidebar-additional' ).panel( 'homepage_additional_panel' );
	wp.customize.section( 'sidebar-widgets-sidebar-additional' ).priority( '3' );
	
});