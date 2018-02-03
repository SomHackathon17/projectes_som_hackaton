jQuery(document).ready(function() {
    var spasalon_aboutpage = spasalonLiteWelcomeScreenObject.aboutpage;
    var spasalon_nr_actions_required = spasalonLiteWelcomeScreenObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof spasalon_aboutpage !== 'undefined') && (typeof spasalon_nr_actions_required !== 'undefined') && (spasalon_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + spasalon_aboutpage + '"><span class="spasalon-actions-count">' + spasalon_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".spasalon-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section spasalon-upsells">');
    }
    if (typeof spasalon_aboutpage !== 'undefined') {
        jQuery('.spasalon-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + spasalon_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', spasalonLiteWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".spasalon-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});