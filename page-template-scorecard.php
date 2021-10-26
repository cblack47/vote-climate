
<?php
/*
Template Name: ScoreCard Page
*/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>
<script>
jQuery(document).ready( function () {

	jQuery('#senators-table').DataTable(  {"responsive": true, "paging": false, "info": false, "searching": false, "order": [[ 2, 'asc' ]]  }    ); 
	jQuery('#senators-new-table').DataTable(  {"responsive": true, "paging": false, "info": false, "searching": false, "order": [[ 1, 'asc' ]]  }    );
	jQuery('#representatives-table').DataTable(  {"responsive": true, "paging": false, "info": false, "searching": false, "order": [[ 1, 'asc' ]]  }   );
	jQuery('#representatives-new-table').DataTable(  {"responsive": true, "paging": false, "info": false, "searching": false, "order": [[ 1, 'asc' ]]  }    ); 	
	jQuery( 'h1' ).css( 'background-color', '#eeeeee' );
} );
</script>

<div id="main-content">

<?php  
 
   global $wpdb;
 
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
					
					    <div class="et_pb_section et_pb_section_1 et_section_regular">
						<div class="et_pb_row et_pb_row_0 et_pb_row_fullwidth">
						
						<?php
						
		if ( post_password_required() ) {
			echo get_the_password_form();
		}
		else {  
						echo '<h1>117th Senators</h1>';
												
						$candidates = array();
						
						$candidates = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}senate_scorecard ");
													
						$votes = '<th class="none">Vote  [Stopping the Dirty Power Scam – 2019: RCV 324]</th><th class="none">Vote  [Wheeler Confirmation (EPA Administrator) – 2019: RCV 33]</th><th class="none">Vote [Anti-Environmental Rescission Package – 2018: RCV 134]</th><th class="none">Vote [Pruitt Confirmation (EPA Administrator) – 2017: RCV 71]</th><th class="none">Vote [Zinke Confirmation (Interior Secretary)– 2017: RCV 79 ]</th><th class="none">Vote [Perry Confirmation (Energy Secretary) – 2017: RCV 79]</th><th class="none">Vote [Tillerson Confirmation (Secretary of State) – 2017: RCV 36]</th><th class="none">Vote  [Anti-Environmental Tax Bill that Opens Drilling in the Arctic Refuge – 2017: RCV 323]</th>';
						echo '<table id="senators-table" ><thead><tr><th data-priority="1">Name</th><th data-priority="2">Terms</th><th data-priority="1">State</th><th data-priority="2">Party</th><th class="none">Position</th><th class="none">Leadership</th><th data-priority="3">Position Score</th><th data-priority="3">Vote Score</th><th data-priority="3">Leadership Score</th><th class="none">Carbon Fee</th><th data-priority="3">Carbon Fee Score</th><th data-priority="1">Overall Score<th class="none">Sources</th>' . $votes . '</tr></thead><tbody>';
							
						foreach ($candidates as $singlecandidate ) {
							/* print_r( $singlecandidate ); */
							echo '<tr><td>' . $singlecandidate->Name . '</td><td>' . $singlecandidate->Terms . '</td><td>' . $singlecandidate->State .'</td><td>' . $singlecandidate->Party . '</td><td>' . $singlecandidate->Position . '</td><td>' . $singlecandidate->Leadership . '</td><td>' . $singlecandidate->PositionScore . '</td><td>'. $singlecandidate->VoteScore . '</td><td>' . $singlecandidate->LeadershipScore . '</td><td>' . $singlecandidate->CarbonFee . '</td><td>' . $singlecandidate->CarbonFeeScore . '</td><td>' . $singlecandidate->OverallScore . '</td><td>'. $singlecandidate->Sources . '</td><td>'. $singlecandidate->RCV324 . '</td><td>'. $singlecandidate->RCV33 . '</td><td>'. $singlecandidate->RCV134 . '</td><td>' . $singlecandidate->RCV71 . '</td><td>' . $singlecandidate->ZinkeRCV79 . '</td><td>'. $singlecandidate->PerryRCV79 . '</td><td>' . $singlecandidate->RCV36 . '</td><td>'. $singlecandidate->RCV323  . '</td></tr>'; 
						}						
						echo '</tbody></table>';	
						
						echo '<h1>117th New Senators</h1>';
						
						$candidates = array();
						
						$candidates = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}senate_scorecard_new ");
							
						echo '<table id="senators-new-table" ><thead><tr><th data-priority="1">Name</th><th data-priority="1">State</th><th class="sorting" data-priority="2">Party</th><th class="none">Position</th><th data-priority="3">Position Score</th><th class="none">Carbon Fee</th><th data-priority="3">Carbon Fee Score</th><th class="sorting" data-priority="1">Overall Score</th><th class="none">Sources</th></tr></thead><tbody>';
							
						foreach ($candidates as $singlecandidate ) {
							/* print_r( $singlecandidate ); */
							echo '<tr><td>' . $singlecandidate->Name . '</td><td>' . $singlecandidate->State .'</td><td>' . $singlecandidate->Party . '</td><td>' . $singlecandidate->Position . '</td><td>' . $singlecandidate->PositionScore . '</td><td>' . $singlecandidate->CarbonFee . '</td><td>' . $singlecandidate->CarbonFeeScore . '</td><td>' . $singlecandidate->OverallScore . '</td><td>' . $singlecandidate->Sources . '</td></tr>';
						}
						echo '</tbody></table>';	
						
						echo '<h1>117th Representatives</h1>';
						
						$candidates = array();
						
							$candidates = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}house_scorecard");

							$votes = '<th class="none">Vote [Climate Action Now Act 2019: RCV 184]</th><th class="none">Vote [Restoring Protections for the Arctic Refuge 2019: RCV 530]</th><th class="none">Vote [Blocking EPA Enforcement of Methane Rules 2019: RCV 385]</th><th class="none">Vote [Stopping the Clean Power Plan and Carbon Pollution Limits for New Power Plants 2019: RCV 381]</th><th class="none">Vote [Stopping Oil and Gas Exploration off the Atlantic Coast 2019: RCV 391]</th><th class="none">Vote [Blocking EPA from Carrying Out Endangerment Finding for CO2 2019: RCV 383]</th><th class="none">Vote [Blocking the Use of the Social Cost of Carbon in Agency Rules 2019: RCV 362] </th>';
							echo '<table id="representatives-table" class="order-column" ><thead><tr><th data-priority="1">Name</th><th data-priority="1">State</th><th data-priority="2">District</th><th data-priority="2">Party</th><th class="none">Position</th><th data-priority="3">Position Score</th><th data-priority="3">Vote Score</th><th class="none">Leadership</th><th data-priority="3">Leadership Score</th><th class="none">Carbon Fee</th><th data-priority="3">Carbon Fee Score</th><th data-priority="1">Overall Score<th class="none">Sources</th>' . $votes . '</tr></thead><tbody>';
							
							foreach ($candidates as $singlecandidate ) {
								/* print_r( $singlecandidate ); */
								echo '<tr><td>' . $singlecandidate->Name . '</td><td>' . $singlecandidate->State .'</td><td>' . $singlecandidate->District . '</td><td>' . $singlecandidate->Party . '</td><td>' . $singlecandidate->Position . '</td><td>' . $singlecandidate->PositionScore . '</td><td>'. $singlecandidate->VoteScore . '</td><td>' . $singlecandidate->Leadership . '</td><td>' . $singlecandidate->LeadershipScore . '</td><td>' . $singlecandidate->CarbonFee . '</td><td>' . $singlecandidate->CarbonFeeScore . '</td><td>' . $singlecandidate->OverallScore . '</td><td>'. $singlecandidate->Sources . '</td><td>'. $singlecandidate->RCV184 . '</td><td>'. $singlecandidate->RCV530 . '</td><td>'. $singlecandidate->RCV385 . '</td><td>' . $singlecandidate->RCV381 . '</td><td>' . $singlecandidate->RCV391 . '</td><td>'. $singlecandidate->RCV383 . '</td><td>' . $singlecandidate->RCV362 . '</td></tr>';
							}							
						
						
							echo '</tbody></table>';	
							
						echo '<h1>117th New Representatives</h1>';
						
						$candidates = array();
						
						$candidates = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}house_scorecard_new");
							
						echo '<table id="representatives-new-table" class="order-column" ><thead><tr><th data-priority="1">Name</th><th class="sorting" data-priority="1">State</th><th class="sorting" data-priority="2">District</th><th class="sorting" data-priority="2">Party</th><th class="sorting none">Position</th><th class="sorting" data-priority="3">Position Score</th><th class="sorting none">Carbon Fee</th><th class="sorting" data-priority="3">Carbon Fee Score</th><th class="sorting" data-priority="1">Overall Score</th><th class="none">Sources</th></tr></thead><tbody>';
							
							foreach ($candidates as $singlecandidate ) {
								/* print_r( $singlecandidate ); */
								echo '<tr><td>' . $singlecandidate->Name . '</td><td>' . $singlecandidate->State .'</td><td>' . $singlecandidate->District . '</td><td>' . $singlecandidate->Party . '</td><td>' . $singlecandidate->Position . '</td><td>' . $singlecandidate->PositionScore . '</td><td>' . $singlecandidate->CarbonFee . '</td><td>' . $singlecandidate->CarbonFeeScore . '</td><td>' . $singlecandidate->OverallScore . '</td><td>' . $singlecandidate->Sources . '</td></tr>';
							}
							echo '</tbody></table>';	

		}/* end of if	post password required */						
						
						?></div></div><?php
						
						if ( ! $is_page_builder_used )
							wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div> <!-- .entry-content -->

				

				</article> <!-- .et_pb_post -->

			<?php endwhile; 
			the_content();?>

</div> <!-- #main-content -->


<?php

get_footer();
