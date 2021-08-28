<?php
/*
Template Name: PP Slides
*/
/** header */
get_header();

// /** banner */
get_template_part( 'template-parts/parts-front', 'banner' );


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


// Reality Section
$reality_heading = get_field('reality_heading');
$target_image = get_field('target_image');
$drug_title = get_field('drug_title');
$drug_image = get_field('drug_image');

if( $target_image || $drug_image ):

    echo '<section class="reality-section position-relative text-767-center">'.
      '<div class="wrapper position-relative">'.
        (
          $reality_heading
          ? '<h2 class="heading"><span>' . $reality_heading . '</span></h2>'
          : ''
        ).
        '<div class="d-flex justify-content-between align-items-center">'.
          (
            $target_image
            ? '<div class="graph-image cell-8 position-relative" data-aos="fade-right" data-aos-duration="2000">' .
              // '<img class="number-20" src="'. get_template_directory_uri() .'/images/number-20.png" />' .
              wp_image($target_image, 'full') .
              // '<img class="number-18" src="'. get_template_directory_uri() .'/images/number-18.png" />' .
            '</div>'
            : ''
          ).
          (
            $drug_image
            ? '<div class="drug-image cell-4 position-relative" data-aos="fade-left" data-aos-duration="2000">' .
              (
                  $drug_title
                  ? '<h3 class="text-left">'. $drug_title .'</h3>'
                  : ''
              ) .
              wp_image($drug_image, 'full') .
            '</div>'
            : ''
          ).
        '</div>'.
      '</div>'.
    '</section>';
endif;


// Solution Section
if( have_rows('solution_listing') ):
    $solution_heading = get_field('solution_heading');
    $solution_image = get_field('solution_image');

    echo '<section class="the-solution-section position-relative text-767-center">'.
      '<div class="wrapper position-relative">'.
        (
          $solution_heading
          ? '<h2 class="heading"><span>' . $solution_heading . '</span></h2>'
          : ''
        ).
        '<div class="d-flex justify-content-between the-solution-content">'.
          '<div class="the-solution-listing cell-5 cell-992-12 d-flex align-items-center position-relative">';
            $count = 1;
              while ( have_rows('solution_listing') ) : the_row();

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
                '<img class="table-box-left" src="'. get_template_directory_uri() .'/images/graph-box.png" />' .
                wp_image($solution_image, 'full','solution-graph-image') .
                '<img class="table-box-right" src="'. get_template_directory_uri() .'/images/graph-box.png" />' .
                '<img class="table-box-center" src="'. get_template_directory_uri() .'/images/fingerprint_matched.png" />' .
                '</div>'
              : ''
            ) .
        '</div>'.
      '</div>'.
  '</section>';
endif;


// Toxicity Section
$toxicity_heading = get_field('toxicity_heading');
$graph_image = get_field('graph_image');
$table_image = get_field('table_image');

if( $graph_image || $table_image ):

    echo '<section class="toxicity-section position-relative text-767-center">'.
      '<div class="wrapper position-relative">'.
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
              '<img class="graph-line" src="'. get_template_directory_uri() .'/images/graph-line-with-text.png" />' .
            '</div>'
            : ''
          ).
          (
            $table_image
            ? '<div class="table-image cell-5 position-relative" data-aos="fade-right" data-aos-duration="1500">' .
              wp_image($table_image, 'full') .
              '<img class="table-box" src="'. get_template_directory_uri() .'/images/graph-box.png" />' .
            '</div>'
            : ''
          ).
        '</div>'.
      '</div>'.
    '</section>';
endif;


// Fingerprint Section
if( have_rows('fingerprint_listing') ):
    $fingerprintHeading = get_field('fingerprint_heading');
    $fingerprintSubHeading = get_field('fingerprint_subheading');

    echo '<section class="fingerprint-section position-relative text-767-center">'.
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
      '<div class="fingerprint-listing d-flex justify-content-between text-center">';
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

            '<div class="circle" data-0="width:100%;" data-3900="width:100%;" data-4000="width:80%;" data-4100="width:60%;" data-4200="width:40%;" data-4300="width:26%;padding:10px;">'.'<img src="'. get_template_directory_uri() .'/images/engagement-part-circle-new.png" />'.'</div>'.
          '</div>'.
        '</div>'.
        '<div class="ibis-image">'.
          '<img src="'. get_template_directory_uri() .'/images/engagement-part.png" />'.
          '<div id="scollicon" class="left-part" data-0="left:579px;top:206px;" data-3900="left:579px;top:206px;" data-3970="left:565px;top:236px;" data-4010="left:550px;top:255px;" data-4110="left:520px;top:275px;" data-4210="left:460px;top:290px;" data-4310="left:380px;top:300px;" data-4380="left:360px;top:305px;" data-4450="left:270px;top:307px;" data-4490="left:220px;top:312px;" data-4530="left:200px;top:317px;" data-4580="left:165px;top:347px;" data-4615="left:157px;top:365px;">'.
            '<img src="'. get_template_directory_uri() .'/images/engagement-part-circle.png" />'.
          '</div>'.

          '<div id="scollicon" class="center-part" data-0="left:50%;top:206px;transform:translateX(-50%)" data-3900="top:206px;" data-3970="top:236px;" data-4010="top:255px;" data-4110="top:275px;" data-4210="top:290px;" data-4310="top:300px;" data-4380="top:305px;" data-4450="top:307px;" data-4490="top:312px;" data-4530="top:317px;" data-4580="top:347px;" data-4615="top:365px;">'.
            '<img src="'. get_template_directory_uri() .'/images/engagement-part-circle.png" />'.
          '</div>'.

          '<div id="scollicon" class="right-part" data-0="right:579px;top:206px;" data-3900="right:579px;top:206px;" data-3970="right:565px;top:236px;" data-4010="right:550px;top:255px;" data-4110="right:520px;top:275px;" data-4310="right:460px;top:290px;" data-1610="right:380px;top:300px;" data-4380="right:360px;top:305px;" data-4450="right:270px;top:307px;"  data-4490="right:220px;top:312px;" data-4530="right:200px;top:317px;" data-4580="right:165px;top:347px;" data-4615="right:157px;top:365px;">'.
            '<img src="'. get_template_directory_uri() .'/images/engagement-part-circle.png" />'.
          '</div>'.
        '</div>'.
      '<div class="engagement-listing d-flex justify-content-between text-center">';
        $count = 1;
          while ( have_rows('engagement_listing') ) : the_row();

              $image = get_sub_field('image');
              $title = get_sub_field('title');

              echo '<div class="single-list position-relative">'.
                  '<div class="image-block" >'.
                  '<div class="icon text-center pb-10" data-aos="zoom-in" data-aos-duration="3000">'. wp_image($image, 'full') .'</div>'.
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


// /** footer */
get_footer();

?>
