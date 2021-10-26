
<?php
/*
Template Name: Governor Results Page
*/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>
<script>
jQuery(document).ready( function () {

	jQuery('#governors-table').DataTable(  {"responsive": true, "paging": false, "info": false, "searching": false }  ); 
	jQuery('#gcandidates-table').DataTable(  {"responsive": true, "paging": false, "info": false, "searching": false  }   );  
	jQuery( 'h1' ).css( 'background-color', '#eeeeee' );
} );
</script>

<div id="main-content">

<?php  
 
   global $wpdb;
 
  $state = strip_tags(trim($_GET["state"])); 
   
  $wpdb->show_errors(); 
  
  /* by now we have valid state if possible */

?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( ! $is_page_builder_used ) : ?>

					<h1 class="entry-title main_title"><?php the_title(); ?></h1>
				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_featured_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
				?>

				<?php endif; ?>
				

				

					<div class="entry-content">
					
					    <div class="et_pb_section et_pb_section_1 et_section_regular" style="padding-bottom:0px;" >
						<div class="et_pb_row et_pb_row_0 et_pb_row_fullwidth style="padding-bottom:0px;">
						
						<?php
						
		if ( post_password_required() ) {
			echo get_the_password_form();
		}
		else {
			
			   
						echo '<h1>U.S. Gubernatorial Incumbents</h1>';
						
						$candidates = array();
						
						if (!empty($state)) {
							$candidates = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}governors WHERE state='" . $state . "' ");
						}
						else {
							
						}
							

						/* $votes = '<th class="none">Vote  [Stopping the Dirty Power Scam – 2019: RCV 324]</th><th class="none">Vote  [Wheeler Confirmation (EPA Administrator) – 2019: RCV 33]</th><th class="none">Vote [Anti-Environmental Rescission Package – 2018: RCV 134]</th><th class="none">Vote [Pruitt Confirmation (EPA Administrator) – 2017: RCV 71]</th><th class="none">Vote [Zinke Confirmation (Interior Secretary)– 2017: RCV 79 ]</th><th class="none">Vote [Perry Confirmation (Energy Secretary) – 2017: RCV 79]</th><th class="none">Vote [Tillerson Confirmation (Secretary of State) – 2017: RCV 36]</th><th class="none">Vote  [Anti-Environmental Tax Bill that Opens Drilling in the Arctic Refuge – 2017: RCV 323]</th>'; */
						
						$heading = '<table id="governors-table" ><thead><tr><th data-priority="1">Name</th><th data-priority="2">State</th>';
						$heading .= '<th data-priority="2">Party</th><th class="none">Position</th><th data-priority="2">Position Score</th>';
						
						
						$heading .= '<th class="none">Climate Plan [100% Renewable Energy by 2030]</th><th class="none">Climate Plan [Zero Human GHG Emission by 2050]</th>';
						$heading .= '<th class="none">Climate Plan [Fossil Fuels in the Ground]</th><th class="none">Climate Plan [Carbon Dioxide Removal]</th>';
						$heading .= '<th class="none">Climate Plan [100% Renewable Energy by 2030]</th><th class="none">Climate Plan [Zero Human GHG Emission by 2050]</th>';
						$heading .= '<th class="none">Climate Plan [Fossil Fuels in the Ground]</th><th class="none">Climate Plan [Carbon Dioxide Removal]</th>';
				
						
						
						$heading .= '<th data-priority="3">Planet Plan Score</th>';
						$heading .= '<th class="none">Leadership</th><th data-priority="3">Leadership Score</th>';
						$heading .= '<th class="none">Carbon Fee</th><th data-priority="3">Carbon Fee Score</th><th data-priority="1">Overall Score</th><th class="none">Sources</th>';
						$heading .= '</tr></thead><tbody>';
						
						echo $heading;
							
						foreach ($candidates as $singlecandidate ) {
							/* print_r( $singlecandidate ); */
							$row = '<tr><td>' . $singlecandidate->Name . '</td><td>' . $singlecandidate->State .'</td><td>' . $singlecandidate->Party . '</td><td>';
							$row .= $singlecandidate->Position . '</td><td>' . $singlecandidate->PositionScore  . '</td><td>';
							
							
							$row .= $singlecandidate->Renewable . '</td><td>' . $singlecandidate->Zero  . '</td><td>';
							$row .= $singlecandidate->Fossil . '</td><td>' . $singlecandidate->CO2  . '</td><td>';
							$row .= $singlecandidate->RenewablePlan . '</td><td>' . $singlecandidate->ZeroPlan  . '</td><td>';
							$row .= $singlecandidate->FossilPlan . '</td><td>' . $singlecandidate->CO2Plan  . '</td><td>';
							
							$row .= $singlecandidate->PlanetPlanScore . '</td><td>';
							$row .= $singlecandidate->Leadership . '</td><td>' .  $singlecandidate->LeadershipScore . '</td><td>' ;
							$row .= $singlecandidate->CarbonFee . '</td><td>' . $singlecandidate->CarbonFeeScore . '</td><td>';
							$row .= $singlecandidate->OverallScore . '</td><td>' . $singlecandidate->Sources .  '</td></tr>'; 
							echo $row;
						}
						echo '</tbody></table>';	
						
						echo '<h1>U.S. Gubernatorial Challengers</h1>';
						
						$candidates = array();
						
						if (!empty($state)) {
							$candidates = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}governor_candidates WHERE state='" . $state . "' ");
						}
						else {
		
						}
							
						$heading = '<table id="gcandidates-table" ><thead><tr><th data-priority="1">Name</th><th data-priority="2">State</th>';
						$heading .= '<th data-priority="2">Party</th><th class="none">Position</th><th data-priority="2">Position Score</th>';
						
						$heading .= '<th class="none">Climate Plan [100% Renewable Energy by 2030]</th><th class="none">Climate Plan [Zero Human GHG Emission by 2050]</th>';
						$heading .= '<th class="none">Climate Plan [Fossil Fuels in the Ground]</th><th class="none">Climate Plan [Carbon Dioxide Removal]</th>';
						$heading .= '<th class="none">Climate Plan [100% Renewable Energy by 2030]</th><th class="none">Climate Plan [Zero Human GHG Emission by 2050]</th>';
						$heading .= '<th class="none">Climate Plan [Fossil Fuels in the Ground]</th><th class="none">Climate Plan [Carbon Dioxide Removal]</th>';
						
						
						$heading .= '<th data-priority="3">Planet Plan Score</th>';
						$heading .= '<th class="none">Leadership</th><th data-priority="3">Leadership Score</th>';
						$heading .= '<th class="none">Carbon Fee</th><th data-priority="3">Carbon Fee Score</th><th data-priority="1">Overall Score</th><th class="none">Sources</th>';
						$heading .= '</tr></thead><tbody>';	
						echo $heading;
						
						foreach ($candidates as $singlecandidate ) {
							/* print_r( $singlecandidate ); */
							$row = '<tr><td>' . $singlecandidate->Name . '</td><td>' . $singlecandidate->State .'</td><td>' . $singlecandidate->Party . '</td><td>';
							$row .= $singlecandidate->Position . '</td><td>' . $singlecandidate->PositionScore  . '</td><td>';
							
							$row .= $singlecandidate->Renewable . '</td><td>' . $singlecandidate->Zero  . '</td><td>';
							$row .= $singlecandidate->Fossil . '</td><td>' . $singlecandidate->CO2  . '</td><td>';
							$row .= $singlecandidate->RenewablePlan . '</td><td>' . $singlecandidate->ZeroPlan  . '</td><td>';
							$row .= $singlecandidate->FossilPlan . '</td><td>' . $singlecandidate->CO2Plan  . '</td><td>';
							
							
							$row .= $singlecandidate->PlanetPlanScore . '</td><td>';
							$row .= $singlecandidate->Leadership . '</td><td>' .  $singlecandidate->LeadershipScore . '</td><td>' ;
							$row .= $singlecandidate->CarbonFee . '</td><td>' . $singlecandidate->CarbonFeeScore . '</td><td>';
							$row .= $singlecandidate->OverallScore . '</td><td>'. $singlecandidate->Sources .  '</td></tr>'; 
							echo $row;
							
						}
						echo '</tbody></table>';	 						
				

		}/* end of if	post password required */						
						
						?></div></div><?php
						
				the_content();

				if ( ! $is_page_builder_used )
							wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div> <!-- .entry-content -->

				

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

</div> <!-- #main-content -->


<?php

get_footer();
