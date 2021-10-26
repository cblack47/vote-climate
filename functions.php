<?php 


add_action( 'wp_enqueue_scripts', 'my_enqueue_assets' ); 

function my_enqueue_assets() { 

    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' ); 

} 

add_filter( 'gform_confirmation_anchor_1', '__return_false' );


/* 

add_filter( 'gform_confirmation_2', 'custom_confirmation', 10, 4 );
function custom_confirmation( $confirmation, $form, $entry ) {
    
	$zipcode = rgar( $entry, '1.5' );
	if (!empty($zipcode) ) {
	  
       $newdb = new wpdb('lookitup', 'e>aT6aool1Fc', 'find-district', 'localhost');
       $newdb->show_errors(); 
       $place = $newdb->get_row( 'SELECT * FROM ziplisting WHERE zipcode = ' . $zipcode );
       echo 'state ' . $place->state . ' and ' . $place->district;
       $lookup_state = $place->state;
       $lookup_districts  = str_replace( ',', '|', $place->district);
		echo 'state ' . $lookup_state . ' and ' . $lookup_districts;	   
   }
	
	$confirmation[redirect] .= "?state=" . $place->state . "&district=" . $lookup_districts;
	    
    return $confirmation;
}
*/