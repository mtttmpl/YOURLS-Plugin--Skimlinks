<?php
/*
Plugin Name: Skimlinks
Plugin URI: http://www.mattytemple.com
Description:  Push shortened URLS through Skimlinks for affiliate advertising
Version: 1.1
Author: Matt Temple
Author URI: http://www.mattytemple.com
*/

// Hook our custom function into the 'redirect' filter
yourls_add_filter( 'redirect', 'matt_skim', 10, 1 );

// Our custom function that will be triggered when the event occurs
function matt_skim( $url ) {
        // Build URL
        $encoded = urlencode($url);
        $skimurl = "http://YOURDOMAIN/?id=YOURID&xs=1&url="; //if you do not have a custom domain use redirect.skimlinks.com
        $finalurl = $skimurl . $encoded;
        
        // Return the skimmed URL
        return $finalurl;
}