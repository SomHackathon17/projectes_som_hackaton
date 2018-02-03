jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About spasalon page -> Actions required tab */
    var spasalon_nr_actions_required = spasalonLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof spasalon_nr_actions_required !== 'undefined') && (spasalon_nr_actions_required != '0') ) {
        jQuery('li.spasalon-w-red-tab a').append('<span class="spasalon-actions-count">' + spasalon_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".spasalon-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'spasalon_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : spasalonLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.spasalon-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + spasalonLiteWelcomeScreenObject.template_directory + '/inc/spasalon-info/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var spasalon_lite_actions_count = jQuery('.spasalon-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof spasalon_lite_actions_count !== 'undefined' ) {
                    if( spasalon_lite_actions_count == '1' ) {
                        jQuery('.spasalon-actions-count').remove();
                        jQuery('.spasalon-tab-pane#actions_required').append('<p>' + spasalonLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.spasalon-actions-count').text(parseInt(spasalon_lite_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function spasalon_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".spasalon-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var spasalon_actions_anchor = location.hash;

	if( (typeof spasalon_actions_anchor !== 'undefined') && (spasalon_actions_anchor != '') ) {
		spasalon_welcome_page_tabs('a[href="'+ spasalon_actions_anchor +'"]');
	}

    jQuery(".spasalon-nav-tabs a").click(function(event) {
        event.preventDefault();
		spasalon_welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.spasalon-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
