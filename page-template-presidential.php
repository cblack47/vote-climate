
<?php
/*
Template Name: Presidential Page
*/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>
<script>

jQuery(document).ready( function () {
	
	jQuery('#presidential-table').DataTable(  { 
	
		responsive: true, "order": [[20,'asc'],[ 0, 'asc' ]], "paging": false, "info": false, "searching": false  }    ); 

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

					<?php $thumb = '';
					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );
					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_featured_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
				
				endif; 

				if ( post_password_required() ) {
					echo get_the_password_form();
				}
				else {  
				
					 ?>					
				
					<div class="entry-content">				
					<div class="et_pb_section et_pb_section_1 et_section_regular">
					<div class="et_pb_row et_pb_row_0 et_pb_row_fullwidth">
						
					<?php
							
					echo '<h1>2020 Presidential Candidates Voter’s Guide</h1>';							
												
					$candidates = array();
						
					$candidates = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}presidential ");
													
					echo '<table id="presidential-table" ><thead><tr><th data-priority="1">Candidate Name</th><th data-priority="2">Political Office</th><th data-priority="2">Party</th><th class="none">Position</th><th data-priority="3">Position Score</th> <th class="none">Endorses the Green New Deal</th><th class="none">Details</th><th class="none">100% Renewable Energy by 2030</th><th class="none">Details</th><th class="none">Fossil Fuels in the Ground</th><th class="none">Details</th><th class="none">Carbon Dioxide Removal</th><th class="none">Details</th><th data-priority="2">Climate Plan Score</th><th class="none">Leadership</th><th data-priority="2">Leadership Score</th></th><th class="none">Carbon Fee</th><th data-priority="3">Carbon Fee Score</th><th data-priority="1">Climate Calculation</th><th class="none">Sources</th><th data-priority="1">Status</th>' . '</tr></thead><tbody>';
					
							
					foreach ($candidates as $singlecandidate ) {
						/* print_r( $singlecandidate ); */
						echo '<tr><td>' . $singlecandidate->Name . '</td><td>' . $singlecandidate->PoliticalOffice . '</td><td>' .  $singlecandidate->Party . '</td><td>' . $singlecandidate->Position . '</td><td>' .  $singlecandidate->PositionScore . '</td><td>' .  $singlecandidate->GreenNewDeal . '</td><td>' . $singlecandidate->Green . '</td><td>' . $singlecandidate->RenewableEnergy . '</td><td>' . $singlecandidate->Renewable . '</td><td>' . $singlecandidate->FossilFuels . '</td><td>' . $singlecandidate->Fossil . '</td><td>' . $singlecandidate->CarbonSequestration . '</td><td>' .  $singlecandidate->Carbon . '</td><td>' . $singlecandidate->PlatformScore . '</td><td>' .  $singlecandidate->Leadership . '</td><td>' . $singlecandidate->LeadershipScore . '</td><td>' . $singlecandidate->CarbonFeePlan . '</td><td>' . $singlecandidate->CarbonFeeScore . '</td><td>' .  $singlecandidate->OverallScore . '</td><td>' . $singlecandidate->Sources . '</td><td>' . $singlecandidate->Status . '</td></tr>';
					}
					echo '</tbody></table>';	
					
					the_content();
						
					?>
					</div></div>
												
						<?php	if ( ! $is_page_builder_used )
							wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) ); 
						?>
					
					</div> <!-- .entry-content -->
				<?php  }  /* end of if post password required */ ?>
				

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

</div> <!-- #main-content -->


<?php

get_footer();
