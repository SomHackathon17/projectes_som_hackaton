<?php
/**
 * side bar template
 *
 * @package WordPress
 * @subpackage spasalon
 */
?>

<?php if ( is_active_sidebar( 'sidebar-primary' )  ) : ?>
<!--Sidebar-->
<div class="col-md-4 col-xs-12">
	<div class="sidebar">
	<?php dynamic_sidebar( 'sidebar-primary' ); ?>
	</div>
</div>
<!--/End of Sidebar-->
<?php endif; ?>