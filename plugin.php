<?php
/*
Plugin Name: Skimlinks
Plugin URI: http://www.mattytemple.com
Description:  Push shortened URLS through Skimlinks for affiliate advertising
Version: 1.0
Author: Matt Temple
Author URI: http://www.mattytemple.com
*/

// Hook our custom function into the 'pre_redirect' event
yourls_add_action( 'pre_redirect', 'matt_skim' );

// Our custom function that will be triggered when the event occurs
function matt_skim( $args ) {
        $url = $args[0];
        $code = $args[1];
        
        // Build URL
        $encoded = urlencode($url);
		$skimurl = "http://YOURDOMAIN/?id=YOURID&xs=1&url="; //if you do not have a custom domain use redirect.skimlinks.com
		$finalurl = $skimurl . $encoded;
		
		// Go
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $finalurl");
		
		// Now die so the normal flow of event is interrupted
        die();
      
}