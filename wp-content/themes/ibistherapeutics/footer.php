<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>

</div><!-- #content -->
</div><!-- #page -->
<?php
echo '<footer class="site-footer position-relative text-767-center">'.
      '<div class="footer-form mb-767-30">'.
        do_shortcode('[email-subscribers-form id="1"]') .
      '</div>'.
			'<div class="footer-top">'.
          '<div class="wrapper d-flex justify-content-between justify-767-content-center pb-20 pb-1024-0 position-relative">'.
              '<div class="left-part cell-4 cell-1024-8 cell-767-12 pb-1024-30">'.
									footer_logo_new().
                  (
                    get_field('footer_text', 'options')
                    ? '<p>'. get_field('footer_text', 'options') .'</p>'
                    : ''
                  ) .
                  social_media_options() .
							'</div>'.
              '<div class="footer-menu middle-part cell-3 cell-1024-4 cell-767-12 pl-1024-20 pb-767-30 pl-767-0">'.
                  do_shortcode('[footer-navigation]') .
              '</div>'.
							'<div class="right-part contact-part cell-3 cell-1200-4 cell-1024-6 cell-767-12">'.
									(
											get_field('location_address','options')
											? '<div class="footer-details">'.
													'<h4 class="mb-10 text-brand-primary">Contact Us</h4>'.
                          do_shortcode('[location-address]') .
													do_shortcode('[location-email]') .
                          do_shortcode('[location-phone]') .
											'</div>'
											: ''
									) .
							'</div>'.
					'</div>'.
          '</div>' .
					'<div class="footer-bottom copyright-block pt-20 pb-20 text-center pt-640-0">' .
            '<div class="wrapper">'.
  	            (
  	                get_field('links', 'options')
  	                ? '<div class="copyright d-flex justify-content-between align-items-center pt-992-10">
                    <p>@Copyright' . ' ' .  date("Y") . ' ' . do_shortcode("[site-name]") .  ' All rights reserved </p><p>' . get_field('links', 'options')  .   '</p></div>'
  	                : ''
  	            ) .
          '</div>'.
		'</div>'.
'</footer>';
 ?>

</footer><!-- #colophon -->


<?php
wp_footer();
?>
</body>
</html>
