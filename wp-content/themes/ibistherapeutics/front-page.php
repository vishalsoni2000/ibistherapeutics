<?php
/*
Template Name: Front Page
*/
/** header */
get_header();

// /** banner */
get_template_part( 'template-parts/parts-front', 'banner' );


// Unique Solution
// if( have_rows('solution_listing') ):
//     $solutionTitle = get_field('solution_title');
//     $solutionImage = get_field('solution_image');
//     $stageImage = get_field('stage_image');
//
//     echo '<section class="solution-section position-relative text-767-center">'.
//       '<div class="wrapper position-relative">'.
//     (
//       $solutionTitle
//       ? '<h1 class="h2 heading"><span>' . $solutionTitle . '</span></h1>'
//       : ''
//     ).
//     '<div class="solution-content d-flex justify-content-between align-items-center">'.
//       (
//         $solutionImage
//         ? '<div class="solution-image cell-5 cell-992-12">'.
//             wp_image($solutionImage, 'full') .
//         '</div>'
//         : ''
//       ).
//       (
//         $stageImage
//         ? '<div class="solution-image cell-7 cell-992-12 pl-20 pl-992-0 pt-992-30">'.
//             wp_image($stageImage, 'full') .
//         '</div>'
//         : ''
//       ).
//       '</div>'.
//     '</div>'.
//   '</section>';
// endif;



// Integrated Section
if( have_rows('integrated_listing') ):
    $integrated_title = get_field('integrated_title');
    $integrated_image = get_field('integrated_image');

    echo '<section class="integrated-section position-relative text-767-center">'.
      '<div class="wrapper position-relative">'.
        '<div class="d-flex justify-content-between integrated-content">'.
          '<div class="integrated-listing cell-6 cell-992-12 position-relative">'.
              '<div class="heading-part">'.
                '<div class="heading-box"></div>'.
                (
                  $integrated_title
                  ? '<h2>' . $integrated_title . '</h2>'
                  : ''
                ).
              '</div>';

              while ( have_rows('integrated_listing') ) : the_row();

                  $title = get_sub_field('title');

                  echo '<div class="single-list cell-12 position-relative" data-aos="fade-right" data-aos-duration="1700">'.
                        (
                          $title
                          ? '<h4 class="">'. $title .'</h4>'
                          : ''
                        ) .
                  '</div>';
              endwhile;
          echo '</div>'.
            (
              $integrated_image
              ? '<div class="integrated-image position-relative cell-6 cell-992-12" data-aos="fade-left" data-aos-duration="1700">'.
                  '<div class="image-src inbanner">'.
                    wp_image($integrated_image, 'full') .
                  '</div>'.
                '</div>'
              : ''
            ) .
        '</div>'.
      '</div>'.
  '</section>';
endif;



// Problem Effect Section
if( have_rows('problem_effect_listing') ):
    $problemEffectHeading = get_field('problem_effect_heading');

    echo '<section class="problem-effect-section position-relative text-767-center">'.
      '<div class="wrapper position-relative">'.
        (
          $problemEffectHeading
          ? '<h2 class="heading"><span>' . $problemEffectHeading . '</span></h2>'
          : ''
        ).
      '<div class="problem-effect-listing d-flex justify-content-between text-center">';
        $count = 1;
          while ( have_rows('problem_effect_listing') ) : the_row();

              $image = get_sub_field('image');
              $title = get_sub_field('title');

              echo '<div class="single-list position-relative">'.
                  '<div class="image-block" >'.
                  '<div class="icon text-center pb-10" data-aos="zoom-in" data-aos-duration="2500">'. wp_image($image, 'full') .'</div>'.
                    (
                      $title
                      ? '<h4 data-aos="fade-up" data-aos-duration="1700">'. $title .'</h4>'
                      : ''
                    ) .
                  '</div>'.
              '</div>';
              $count++;
          endwhile;
      echo '</div>'.
      '</div>'.
  '</section>';
endif;


// Solution Section
if( have_rows('solutions_listing') ):
    $solution_heading = get_field('solution_heading');
    $solution_image = get_field('solution_image');

    echo '<section class="the-solution-section position-relative text-767-center new-section">'.
      '<div class="wrapper position-relative">'.
        (
          $solution_heading
          ? '<h2 class="heading"><span>' . $solution_heading . '</span></h2>'
          : ''
        ).
        '<div class="d-flex justify-content-between the-solution-content">'.
          '<div class="the-solution-listing cell-5 cell-992-12 d-flex align-items-center position-relative">';
            $count = 1;
              while ( have_rows('solutions_listing') ) : the_row();

                  $title = get_sub_field('title');

                  echo '<div class="single-list cell-12 position-relative">'.
                        (
                          $title
                          ? '<h4 class="d-flex align-items-center" data-aos="fade-right" data-aos-duration="1700"><span>0'. $count .'</span>'. $title .'</h4>'
                          : ''
                        ) .
                  '</div>';
                  $count++;
              endwhile;
          echo '</div>'.
            (
              $solution_image
              ? '<div class="solution-image position-relative cell-7 cell-992-12" data-aos="fade-left" data-aos-duration="1700">'.
                '<img class="table-box-left" src="'. get_template_directory_uri() .'/images/graph-box-new.png" />' .
                wp_image($solution_image, 'full','solution-graph-image') .
                '<img class="table-box-right" src="'. get_template_directory_uri() .'/images/graph-box-new.png" />' .
                '<img class="table-box-center" src="'. get_template_directory_uri() .'/images/fingerprint_matched.png" />' .
                '</div>'
              : ''
            ) .
        '</div>'.
      '</div>'.
  '</section>';
endif;


// Fingerprint Section
if( have_rows('fingerprint_listing') ):
    $fingerprintHeading = get_field('fingerprint_heading');
    $fingerprintSubHeading = get_field('fingerprint_subheading');

    echo '<section class="fingerprint-section position-relative text-767-center new-section">'.
      '<div class="wrapper position-relative">'.
        (
          $fingerprintHeading
          ? '<h2 class="heading"><span>' . $fingerprintHeading . '</span></h2>'
          : ''
        ).
        (
          $fingerprintSubHeading
          ? '<h3>' . $fingerprintSubHeading . '</h3>'
          : ''
        ).
      '</div>'.
      '<div class="fingerprint-listing d-flex justify-content-between text-center wrapper">';
        $count = 1;
          while ( have_rows('fingerprint_listing') ) : the_row();

              $title = get_sub_field('title');
              $image = get_sub_field('image');
              $subtitle = get_sub_field('subtitle');

              echo '<div class="single-list position-relative">'.
                  '<div class="detail-block bg-white">'.
                      '<div class="image-block" >'.
                          (
                            $title
                            ? '<h4 data-aos="fade-right" data-aos-duration="1700">'. $title .'</h4>'
                            : ''
                          ) .
                          '<div class="icon text-center pb-10" data-aos="fade-right" data-aos-duration="2300">'. wp_image($image, 'full') .'</div>'.
                      '</div>'.
                      (
                        $subtitle
                        ? '<h5 data-aos="fade-right" data-aos-duration="800">'. $subtitle .'</h5>'
                        : ''
                      ) .
                  '</div>'.
              '</div>';
              $count++;
          endwhile;
      echo '</div>'.
  '</section>';
endif;


// Toxicity Section
$toxicity_heading = get_field('toxicity_heading');
$graph_image = get_field('graph_image');
$table_image = get_field('table_image');

if( $graph_image || $table_image ):

    echo '<section class="toxicity-section position-relative text-767-center new-section">'.
      '<div class="wrapper">'.
        (
          $toxicity_heading
          ? '<h2 class="heading"><span>' . $toxicity_heading . '</span></h2>'
          : ''
        ).
        '<div class="d-flex justify-content-between">'.
          (
            $graph_image
            ? '<div class="graph-image cell-6 position-relative" data-aos="fade-right" data-aos-duration="1500">' .
              wp_image($graph_image, 'full') .
              '<img class="graph-line" src="'. get_template_directory_uri() .'/images/graph-line-with-text-new.png" />' .
            '</div>'
            : ''
          ).
          (
            $table_image
            ? '<div class="table-image cell-5 position-relative" data-aos="fade-right" data-aos-duration="1500">' .
              wp_image($table_image, 'full') .
              '<img class="table-box" src="'. get_template_directory_uri() .'/images/graph-box-new.png" />' .
              '<img class="table-button" src="'. get_template_directory_uri() .'/images/pointer.png" />' .
            '</div>'
            : ''
          ).
        '</div>'.
      '</div>'.
    '</section>';
endif;


// Engagement Section
if( have_rows('engagement_listing') ):
    $engagementHeading = get_field('engagement_heading');

    echo '<section class="engagement-section position-relative text-767-center">'.
    '<script src="'. get_template_directory_uri() .'/js/skrollr.min.js"></script>'.
      '<div class="wrapper position-relative">'.
        (
          $engagementHeading
          ? '<h2 class="heading"><span>' . $engagementHeading . '</span></h2>'
          : ''
        ).
        '<div class="text-center">'.
          '<div class="ibis-button">'.
            '<h2>IBIS Platform</h2>'.

            '<div class="circle" data-0="width:100%;" data-4000="width:100%;" data-4100="width:80%;" data-4200="width:60%;" data-4300="width:40%;" data-4400="width:26%;padding:10px;">'.'<img src="'. get_template_directory_uri() .'/images/engagement-part-circle-new.png" />'.'</div>'.
          '</div>'.
        '</div>'.
        '<div class="ibis-image">'.
          '<img src="'. get_template_directory_uri() .'/images/engagement-part-new.png" />'.
          '<div id="scollicon" class="left-part" data-0="left:540px;top:196px;" data-4100="left:540px;top:196px;" data-4170="left:535px;top:226px;" data-4210="left:520px;top:240px;" data-4310="left:490px;top:260px;" data-4410="left:430px;top:275px;" data-4410="left:350px;top:280px;" data-4580="left:330px;top:285px;" data-4650="left:230px;top:292px;" data-4690="left:190px;top:297px;" data-4730="left:170px;top:302px;" data-4780="left:130px;top:332px;" data-4815="left:122px;top:350px;">'.
            '<img src="'. get_template_directory_uri() .'/images/engagement-part-circle.png" />'.
          '</div>'.

          '<div id="scollicon" class="center-part" data-0="left:50%;top:206px;transform:translateX(-50%)" data-4100="top:196px;" data-4170="top:226px;" data-4210="top:240px;" data-4310="top:260px;" data-4410="top:275px;" data-4410="top:280px;" data-4580="top:285px;" data-4650="top:292px;" data-4690="top:297px;" data-4730="top:302px;" data-4780="top:332px;" data-4815="top:350px;">'.
            '<img src="'. get_template_directory_uri() .'/images/engagement-part-circle.png" />'.
          '</div>'.

          '<div id="scollicon" class="right-part" data-0="right:540px;top:196px;" data-4100="right:540px;top:196px;" data-4170="right:535px;top:226px;" data-4210="right:520px;top:240px;" data-4310="right:490px;top:260px;" data-4410="right:430px;top:275px;" data-4410="right:350px;top:280px;" data-4580="right:330px;top:285px;" data-4650="right:230px;top:292px;" data-4690="right:190px;top:297px;" data-4730="right:170px;top:302px;" data-4780="right:130px;top:332px;" data-4815="right:122px;top:350px;">'.

            '<img src="'. get_template_directory_uri() .'/images/engagement-part-circle.png" />'.
          '</div>'.
        '</div>'.
      '<div class="engagement-listing d-flex justify-content-between text-center">';
        $count = 1;
          while ( have_rows('engagement_listing') ) : the_row();

              $image = get_sub_field('image');
              $title = get_sub_field('title');
              $content = get_sub_field('content');

              echo '<div class="single-list position-relatives">'.
                  '<div class="image-block" >'.
                  '<div class="icon text-center pb-10" data-aos="zoom-in" data-aos-duration="3000">'. wp_image($image, 'full') .'</div>'.
                    (
                      $title
                      ? '<h4 data-aos="fade-up" data-aos-duration="1700">'. $title .'</h4>'
                      : ''
                    ) .
                    (
                      $content
                      ? '<div data-aos="fade-up" data-aos-duration="2200" class="text-left" style="width: 300px;">'. $content .'</div>'
                      : ''
                    ) .
                  '</div>'.
              '</div>';
              $count++;
          endwhile;
      echo '</div>'.
      '</div>'.
  '</section>';
endif;

?>

<script>
	if (jQuery(window).width() > 1250) {
		skrollr.init({
			easing: {
				sin: function(p) {
					return (Math.sin(p * Math.PI * 2 - Math.PI/2) + 1) / 2;
				},
				cos: function(p) {
					return (Math.cos(p * Math.PI * 2 - Math.PI/2) + 1) / 2;
				},
			},
			render: function(data) {
				//Loop
				if(data.curTop === data.maxTop) {
					this.setScrollTop(0, true);
				}
			}
		});
	}
</script>

<?php


// Value Section
if( have_rows('value_listing') ):
    $valueHeading = get_field('value_heading');

    echo '<section class="value-section position-relative text-767-center">'.
      '<div class="wrapper position-relative">'.
    (
      $valueHeading
      ? '<h2 class="heading"><span>' . $valueHeading . '</span></h2>'
      : ''
    ).
      '<div class="value-listing d-flex justify-992-content-center">';
        $count = 1;
          while ( have_rows('value_listing') ) : the_row();

              $valueIcon = get_sub_field('value_icon');
              $valueTitle = get_sub_field('value_title');
              $valueContent = get_sub_field('value_content');

              echo '<div class="single-list cell-4 cell-992-6 cell-767-12 p-15 position-relative">'.
                  '<div class="detail-block bg-white">'.
                      '<div class="icon">'. wp_image($valueIcon, 'medium') .'</div>'.
                      '<h3 class="mb-10 text-center">'. $valueTitle .'</h3>'.
                      '<p>'. $valueContent .'</p>'.
                  '</div>'.
              '</div>';
              $count++;
          endwhile;
      echo '</div>'.
    '</div>'.
  '</section>';
endif;



// Partners Section
if( have_rows('partners_listing') ):
    $partnersHeading = get_field('partners_heading');

    echo '<section class="partners-section position-relative text-767-center">'.
      '<div class="wrapper position-relative">'.
    (
      $partnersHeading
      ? '<h2 class="heading"><span>' . $partnersHeading . '</span></h2>'
      : ''
    ).
      '<div class="partners-listing d-flex">';
        $count = 1;
          while ( have_rows('partners_listing') ) : the_row();

              $partnerLogo = get_sub_field('partner_logo');
              $partnerDesc = get_sub_field('partner_description');

              echo '<div class="single-list cell-6 cell-767-12 p-15 position-relative">'.
                  '<div class="detail-block bg-white">'.
                      '<div class="icon text-center pb-10">'. wp_image($partnerLogo, 'medium') .'</div>'.
                      '<div>'. $partnerDesc .'</div>'.
                  '</div>'.
              '</div>';
              $count++;
          endwhile;
      echo '</div>'.
    '</div>'.
  '</section>';
endif;


// Fingerprint Section
// if( have_rows('fingerprint_listing') ):
//     $fingerprintHeading = get_field('fingerprint_heading');
//     $fingerprintSubHeading = get_field('fingerprint_subheading');
//
//     echo '<section class="fingerprint-section position-relative text-767-center">'.
//       '<div class="wrapper position-relative">'.
//         (
//           $fingerprintHeading
//           ? '<h2 class="heading"><span>' . $fingerprintHeading . '</span></h2>'
//           : ''
//         ).
//         (
//           $fingerprintSubHeading
//           ? '<h3>' . $fingerprintSubHeading . '</h3>'
//           : ''
//         ).
//       '</div>'.
//       '<div class="fingerprint-listing d-flex justify-content-between text-center">';
//         $count = 1;
//           while ( have_rows('fingerprint_listing') ) : the_row();
//
//               $title = get_sub_field('title');
//               $image = get_sub_field('image');
//               $subtitle = get_sub_field('subtitle');
//
//               echo '<div class="single-list position-relative">'.
//                   '<div class="detail-block bg-white">'.
//                       '<div class="image-block" >'.
//                           (
//                             $title
//                             ? '<h4 data-aos="fade-right" data-aos-duration="1700">'. $title .'</h4>'
//                             : ''
//                           ) .
//                           '<div class="icon text-center pb-10" data-aos="fade-right" data-aos-duration="2300">'. wp_image($image, 'full') .'</div>'.
//                       '</div>'.
//                       (
//                         $subtitle
//                         ? '<h5 data-aos="fade-right" data-aos-duration="800">'. $subtitle .'</h5>'
//                         : ''
//                       ) .
//                   '</div>'.
//               '</div>';
//               $count++;
//           endwhile;
//       echo '</div>'.
//   '</section>';
// endif;
//
//
// // Toxicity Section
// $toxicity_heading = get_field('toxicity_heading');
// $graph_image = get_field('graph_image');
// $table_image = get_field('table_image');
//
// if( $graph_image || $table_image ):
//
//     echo '<section class="toxicity-section position-relative text-767-center">'.
//       '<div class="wrapper position-relative">'.
//         (
//           $toxicity_heading
//           ? '<h2 class="heading"><span>' . $toxicity_heading . '</span></h2>'
//           : ''
//         ).
//         '<div class="d-flex justify-content-between">'.
//           (
//             $graph_image
//             ? '<div class="graph-image cell-6 position-relative" data-aos="fade-right" data-aos-duration="1500">' .
//               wp_image($graph_image, 'full') .
//               '<img class="graph-line" src="'. get_template_directory_uri() .'/images/graph-line.png" />' .
//             '</div>'
//             : ''
//           ).
//           (
//             $table_image
//             ? '<div class="table-image cell-5 position-relative" data-aos="fade-right" data-aos-duration="1500">' .
//               wp_image($table_image, 'full') .
//               '<img class="table-box" src="'. get_template_directory_uri() .'/images/graph-box.png" />' .
//             '</div>'
//             : ''
//           ).
//         '</div>'.
//       '</div>'.
//     '</section>';
// endif;


// /** footer */
get_footer();

?>
