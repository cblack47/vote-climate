
<?php
/*
Template Name: 2018 Find Page
*/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>
<script>
jQuery(document).ready( function () {

	jQuery('#senators-table').DataTable(  {"responsive": true, "paging": false, "info": false, "searching": false, "columns": [ null, null, null, null, null, null, null,  null, null, null, null, null, { "type": "html" }, null, null, null, null, null, null, null, null  ] }    ); 
	jQuery('#scandidates-table').DataTable(  {"responsive": true, "paging": false, "info": false, "searching": false  }    );  
	jQuery('#representatives-table').DataTable(  {"responsive": true, "paging": false, "info": false, "searching": false, "order": [[ 2, 'asc' ], [ 1, 'asc' ]]  }   );
	jQuery('#candidates-table').DataTable(  {"responsive": true, "paging": false, "info": false, "searching": false, "order": [[ 2, 'asc' ], [ 1, 'asc' ]]  }    ); 	
	jQuery( 'h1' ).css( 'background-color', '#eeeeee' );
} );
</script>

<div id="main-content">

<?php  
 
   global $wpdb;
 
  $name = '%' . strip_tags(trim($_GET["candidate"])) . '%';
      
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
			
			   
						echo '<h1>U.S. Senate Incumbents</h1>';
						
						$candidates = array();
						
						if (!empty($name)) {
							$candidates = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}senate_2018 WHERE Name LIKE '" . $name . "' ");
						}
						else {
							
						}
							
						$votes = '<th class="none">Vote Methane Emissions – 2017: RCV 125</th><th class="none">Vote Extreme Attack on Carbon Pollution Limits for New Power Plants (CRA) – 2015: RCV 307</th><th class="none">Vote Climate Change Science Education – 2015: RCV 238</th><th class="none">Vote Responding to Threat of Climate Change – 2015: RCV 115</th><th class="none">Vote International Climate Action – 2015: RCV 20</th><th class="none">Vote Climate Change Science – 2015: RCV 12</th><th class="none">Vote Keystone XL Pipeline – 2014: RCV 280</th><th class="none">Vote Pricing Carbon Pollution – 2013: RCV 59</th>';
						echo '<table id="senators-table" ><thead><tr><th data-priority="1">Name</th><th data-priority="2">Terms</th><th data-priority="2">State</th><th data-priority="2">Party</th><th class="none">Position</th><th class="none">Leadership</th><th data-priority="3">Position Score</th><th data-priority="3">Vote Score</th><th data-priority="3">Leadership Score</th><th class="none">Carbon Fee</th><th data-priority="3">Carbon Fee Score</th><th data-priority="1">Overall Score<th class="none">Sources</th>' . $votes . '</tr></thead><tbody>';
							
						foreach ($candidates as $singlecandidate ) {
							/* print_r( $singlecandidate ); */
							echo '<tr><td>' . $singlecandidate->Name . '</td><td>' . $singlecandidate->Terms . '</td><td>' . $singlecandidate->State .'</td><td>' . $singlecandidate->Party . '</td><td>' . $singlecandidate->Position . '</td><td>' . $singlecandidate->Leadership . '</td><td>' . $singlecandidate->PositionScore . '</td><td>'. $singlecandidate->VoteScore . '</td><td>' . $singlecandidate->LeadershipScore . '</td><td>' . $singlecandidate->CarbonFee . '</td><td>' . $singlecandidate->CarbonFeeScore . '</td><td>' . $singlecandidate->OverallScore . '</td><td>'. $singlecandidate->Sources . '</td><td>'. $singlecandidate->VoteMethane . '</td><td>'. $singlecandidate->VoteExtreme . '</td><td>'. $singlecandidate->VoteClimate . '</td><td>' . $singlecandidate->VoteResponding . '</td><td>' . $singlecandidate->VoteInternational . '</td><td>'. $singlecandidate->VoteScience . '</td><td>' . $singlecandidate->VoteKeystone . '</td><td>'. $singlecandidate->VotePricing  . '</td></tr>';
						}
						echo '</tbody></table>';	
						
						echo '<h1>U.S. Senate Challengers</h1>';
						
						$candidates = array();
						
						if (!empty($name)) {
							$candidates = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}senate_candidates_2018 WHERE Name LIKE '" . $name . "' ");
						}
						else {
		
						}
							
						echo '<table id="scandidates-table" ><thead><tr><th data-priority="1">Name</th><th data-priority="2">State</th><th class="sorting" data-priority="2">Party</th><th class="none">Position</th><th data-priority="3">Position Score</th><th class="none">Carbon Fee</th><th data-priority="3">Carbon Fee Score</th><th class="sorting" data-priority="1">Overall Score</th><th class="none">Sources</th></tr></thead><tbody>';
							
						foreach ($candidates as $singlecandidate ) {
							/* print_r( $singlecandidate ); */
							echo '<tr><td>' . $singlecandidate->Name . '</td><td>' . $singlecandidate->State .'</td><td>' . $singlecandidate->Party . '</td><td>' . $singlecandidate->Position . '</td><td>' . $singlecandidate->PositionScore . '</td><td>' . $singlecandidate->CarbonFee . '</td><td>' . $singlecandidate->CarbonFeeScore . '</td><td>' . $singlecandidate->OverallScore . '</td><td>' . $singlecandidate->Sources . '</td></tr>';
						}
						echo '</tbody></table>';	
						
						echo '<h1>U.S. House Incumbents</h1>';
						
						$candidates = array();
						
						if (!empty($name)) {
							$candidates = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}house_representatives_2018 WHERE Name LIKE '" . $name . "' ");
						}
							
						$votes = '<th class="none">Vote Recognizing the Cost of Climate Change – 2017: RCV 489</th><th class="none">Vote Methane Pollution Safeguards – 2017: RCV 48</th><th class="none">Vote National Security Threat of Climate Change – 2017: RCV 368</th><th class="none">Vote Carbon Pollution – 2016: RCV 43</th><th class="none">Vote Carbon Pollution Limits for Power Plants – 2015: RCV 384</th><th class="none"> Vote Climate Change Resilience & Adaptation – 2015: RCV 508</th><th class="none"> Vote Extreme Attack on Carbon Pollution Limits for New Power Plants (CRA) – 2015: RCV 651</th><th class="none">Vote Climate Change Science – 2014 - RCV 103</th>';
						echo '<table id="representatives-table" class="order-column" ><thead><tr><th data-priority="1">Name</th><th data-priority="2">State</th><th data-priority="2">District</th><th data-priority="2">Party</th><th class="none">Position</th><th data-priority="3">Position Score</th><th data-priority="3">Vote Score</th><th class="none">Leadership</th><th data-priority="3">Leadership Score</th><th class="none">Carbon Fee</th><th data-priority="3">Carbon Fee Score</th><th data-priority="1">Overall Score<th class="none">Sources</th>' . $votes . '</tr></thead><tbody>';
							
						foreach ($candidates as $singlecandidate ) {
							/* print_r( $singlecandidate ); */
							echo '<tr><td>' . $singlecandidate->Name . '</td><td>' . $singlecandidate->State .'</td><td>' . $singlecandidate->District . '</td><td>' . $singlecandidate->Party . '</td><td>' . $singlecandidate->Position . '</td><td>' . $singlecandidate->PositionScore . '</td><td>'. $singlecandidate->VoteScore . '</td><td>' . $singlecandidate->Leadership . '</td><td>' . $singlecandidate->LeadershipScore . '</td><td>' . $singlecandidate->CarbonFee . '</td><td>' . $singlecandidate->CarbonFeeScore . '</td><td>' . $singlecandidate->OverallScore . '</td><td>'. $singlecandidate->Sources . '</td><td>'. $singlecandidate->VoteCost . '</td><td>'. $singlecandidate->VoteMethane . '</td><td>'. $singlecandidate->VoteSecurity . '</td><td>' . $singlecandidate->VoteCarbon . '</td><td>' . $singlecandidate->VoteLimit . '</td><td>'. $singlecandidate->VoteAdapt . '</td><td>' . $singlecandidate->VoteExtreme . '</td><td>'. $singlecandidate->VoteChange  . '</td></tr>';
						}
						echo '</tbody></table>';	
							
						echo '<h1>U.S. House Challengers</h1>';
						
						$candidates = array();
						
						if (!empty($name)) {
							$candidates = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}house_candidates_2018 WHERE Name LIKE '" . $name . "' ");
						}
							
						echo '<table id="candidates-table" class="order-column" ><thead><tr><th data-priority="1">Name</th><th class="sorting" data-priority="2">State</th><th class="sorting" data-priority="2">District</th><th class="sorting" data-priority="2">Party</th><th class="sorting none">Position</th><th class="sorting" data-priority="3">Position Score</th><th class="sorting none">Carbon Fee</th><th class="sorting" data-priority="3">Carbon Fee Score</th><th class="sorting" data-priority="1">Overall Score</th><th class="none">Sources</th></tr></thead><tbody>';
							
						foreach ($candidates as $singlecandidate ) {
							/* print_r( $singlecandidate ); */
							echo '<tr><td>' . $singlecandidate->Name . '</td><td>' . $singlecandidate->State .'</td><td>' . $singlecandidate->District . '</td><td>' . $singlecandidate->Party . '</td><td>' . $singlecandidate->Position . '</td><td>' . $singlecandidate->PositionScore . '</td><td>' . $singlecandidate->CarbonFee . '</td><td>' . $singlecandidate->CarbonFeeScore . '</td><td>' . $singlecandidate->OverallScore . '</td><td>' . $singlecandidate->Sources . '</td></tr>';
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
