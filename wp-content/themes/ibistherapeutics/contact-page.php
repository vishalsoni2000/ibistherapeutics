<?php
/*
Template Name: Contact Page
*/
/** header */
get_header();

// /** banner */
get_template_part( 'template-parts/parts-front', 'inner-banner' );


$contactTitle = get_field('contact_title');
$contactDescription = get_field('contact_description');
$contactForm = get_field('contact_form');

if($contactForm) {
  echo '<section class="contact-section position-relative">'.
    '<div class="wrapper position-relative">'.
        '<div class="contact-form d-flex">'.
            '<div class="form-block bg-white">'.
                (
                  $contactTitle
                  ? '<h2>'. $contactTitle .'</h2>'
                  : ''
                ) .
                (
                  $contactDescription
                  ? '<p>'. $contactDescription .'</p>'
                  : ''
                ) .
                do_shortcode($contactForm) .
            '</div>'.
            '<div class="image-block d-flex justify-content-center align-items-center">'.
                '<img src="'. get_template_directory_uri() .'/images/contact-image.png" />'.
            '</div>'.
            '<div class="contact-info position-absolute">'.
                '<h3 class="text-white">Info</h3>'.
                do_shortcode('[location-email]') .
                do_shortcode('[location-phone]') .
                do_shortcode('[location-address]') .
                do_shortcode('[location-hours]') .
            '</div>'.
        '</div>'.
    '</div>'.
  '</section>';
}

if( get_field( 'address_map_iframe' ,'options') ){
  echo '<section class="map-section">'.
    	do_shortcode('[location-map]') .
  '</section>';
}

// /** footer */
get_footer();

?>
