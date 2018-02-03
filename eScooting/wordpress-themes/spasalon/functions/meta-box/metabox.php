<?php
//code for the meta data...

add_action('admin_init','my_meta_init');

function my_meta_init()
{
	foreach ( array( 'post' , 'page' ) as $type) 
	{
		add_meta_box('my_all_meta', 'my_meta_banner', $type, 'normal', 'high');
	}
					
	add_action('save_post','my_meta_save');
}

// code for banner description
function my_meta_banner()
{
	global $post;
					
	$meta = get_post_meta($post->ID,'_my_meta',TRUE); 
}
//end of banne description
				
function my_meta_save($post_id) 
{
	if((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
        return;
	
	if ( ! current_user_can( 'edit_page', $post_id ) )
	{     return ;	} 

	if(isset($_POST['post_ID']))
	{
		$post_ID   = $_POST['post_ID'];				
		$post_type = get_post_type($post_ID);
		
	if($post_type=='post'){
			update_post_meta($post_ID,'_my_meta',$_POST['_my_meta']);
		}
		else{
			update_post_meta($post_ID,'_my_meta',$_POST['_my_meta']);
		}
		
	}
}