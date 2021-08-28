<?php
/*
Template Name: About Page
*/
/** header */
get_header();

// /** banner */
get_template_part( 'template-parts/parts-front', 'inner-banner' );


echo '<section class="welcome-about">'.
  '<div class="wrapper d-flex justify-content-between position-relative">';
      while (have_posts()) : the_post();
				echo '<div class="content-part cell-6 cell-992-12 text-767-center">' . get_the_content() . '</div>';
	   endwhile;
     echo '<div class="image-part cell-5 cell-992-12 text-992-center">'.
        wp_image(get_field('our_vision_image'), 'full') .
     '</div>'.
  '</div>'.
'</section>';


// check if the repeater field has rows of data
if( have_rows('our_team') ):
  echo '<section class="our-team-section position-relative">'.
    '<div class="wrapper position-relative">'.
      (
          get_field('team_heading')
          ? '<h2 class="position-relative heading text-767-center"><span>'. get_field('team_heading') .'</span></h2>'
          : ''
      ).
      '<div class="team-listing d-flex justify-content-center text-center">';
      while ( have_rows('our_team') ) : the_row();

          $memberImage = get_sub_field('member_image');
          $memberName = get_sub_field('member_name');
          $memberDesignation = get_sub_field('member_designation');
          $memberDetails = get_sub_field('member_details');

          echo '<div class="single-member position-relative">'.
              '<div class="staff-details bg-white position-relative">'.
                  '<div class="staff-image position-absolute">'.
                      '<div class="inbanner image-src">'.
                        wp_image($memberImage, 'full') .
                      '</div>'.
                  '</div>'.
                  '<div class="staff-content">'.
                      (
                        $memberName
                        ? '<h3 data-match-height="staff-heading">'. $memberName .'</h3>'
                        : ''
                      ) .
                      (
                        $memberDesignation
                        ? '<h4 data-match-height="staff-designation">'. $memberDesignation .'</h4>'
                        : ''
                      ) .
                      (
                        $memberDetails
                        ? $memberDetails
                        : ''
                      ) .
                  '</div>'.
                  '<div class="staff-content-hover position-absolute pin-l overflow-hidden cell-12 d-flex align-items-center">'.
                      (
                        $memberDetails
                        ? $memberDetails
                        : ''
                      ) .
                  '</div>'.
              '</div>'.
          '</div>';
      endwhile;
    echo '</div>'.
    '</div>'.
  '</section>';
endif;


// /** footer */
get_footer();

?>
