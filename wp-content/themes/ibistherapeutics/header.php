<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>  >
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <?php wp_head(); ?>
    </head>
    <body>

      <!-- SVG files for Icons and Quotes -->
		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
			<symbol id="date-svg" viewBox="0 0 32.8 32.8">
				<path d="M29.4,1.2h-1.1c0-0.1,0.1-0.2,0.1-0.3c0-0.5-0.4-1-1-1s-1,0.4-1,1c0,0.1,0,0.2,0.1,0.3h-3.7c0-0.1,0.1-0.2,0.1-0.3
					c0-0.5-0.4-1-1-1c-0.5,0-1,0.4-1,1c0,0.1,0,0.2,0.1,0.3h-3.7c0-0.1,0.1-0.2,0.1-0.3c0-0.5-0.4-1-1-1s-1,0.4-1,1c0,0.1,0,0.2,0.1,0.3
					h-3.7c0-0.1,0.1-0.2,0.1-0.3c0-0.5-0.4-1-1-1s-1,0.4-1,1c0,0.1,0,0.2,0.1,0.3H6.3c0-0.1,0.1-0.2,0.1-0.3c0-0.5-0.4-1-1-1s-1,0.4-1,1
					c0,0.1,0,0.2,0.1,0.3H3.4C1.9,1.2,0.6,2.5,0.6,4v26c0,1.5,1.2,2.8,2.8,2.8h22.9l5.9-5.9V4C32.1,2.5,30.9,1.2,29.4,1.2z M30.6,26.3
					l-0.3,0.3H28c-1.1,0-2,0.9-2,2v2.4l-0.3,0.3H3.4c-0.7,0-1.3-0.6-1.3-1.3V11h28.5V26.3z"/>
			</symbol>
	  </svg>

        <?php
            /** mobile navigation */
            echo '<div class="mobile_menu d-none visible-mobile">' .
                '<a href="#" class="close-btn"></a>' .
                '<div class="mob-appntmtn">' .
                  request_button() .
                '</div>' .
                '<div class="inner">' .
                    main_navigation() .
                '</div>' .
                '<div class="mob-other">'.
                    '<div class="footer-details">'.
												'<h4 class="mb-10 text-white">Contact Us</h4>'.
                        do_shortcode('[location-address]') .
												do_shortcode('[location-email]') .
                        do_shortcode('[location-phone]') .
										'</div>'.
                    social_media_options() .
                '</div>'.
           '</div>';
        ?>


        <div id="wrapper" class="sticky-header">

            <?php
                /** Brand Logo Function Start */
                function brand_logo(){
                    ob_start();
                    if( has_custom_logo() ){
                        $desktopBrandLogoID = get_theme_mod( 'custom_logo' ); //Desktop Main brand Logo ID
                        $desktopBrandLogoImage = wp_get_attachment_image( $desktopBrandLogoID , 'full', '', ["class" => "transition"] ); //Desktop Main brand Logo Image
                        echo '<div class="header-logo position-relative transition twidth">' .
                            '<a href="' . get_option('home') . '" class="cell-12 transition position-relative">' .
                                ( $desktopBrandLogoID ? $desktopBrandLogoImage : '' ) .
                            '</a>' .
                        '</div>';
                    }
                    return ob_get_clean();
                }
                /** Brand Logo Function End */

                /** Call Button Function Start */
				function call_buttton() {
                    ob_start();
                    if (get_field('header_phone_number', 'options')) {
                    $total = count(get_field('header_phone_number', 'options'));
                    echo '<li class="call position-relative m-0 p-0 ">';
                        $i = 1;
                        while (have_rows('header_phone_number', 'options')): the_row();
                        global $callIcon;
                        echo (
                            $total == 1
                            ? '<a href="tel:' . preg_replace('/[^0-9]/', '', get_sub_field('tel_tag', 'options') ) . '" class=" one position-relative"><span class="call-icon">' . $callIcon . '</span>' . '<span class="call-us-text">' . get_field('phone_cta_text', 'options') . '</span>' . '</a>'
                            : (
                                $i == 1
                                ? '<a href="#" class="calldd position-relative"><span class="call-icon">'. $callIcon .'</span><span>' . get_field('phone_cta_text', 'options') . '</span></a>' .
                                    '<ul class="callddlist quick-dropdown block-hide position-absolute">'
                                : ''
                            ) .
                            '<li class="' . $i . '"><a href="tel:' . preg_replace('/[^0-9]/', '', get_sub_field('tel_tag', 'options') ) . '" class="one d-block"><span> ' . get_sub_field('phone_number', 'options') . '</span></a></li>' .
                            ( $i == $total ? '</ul>' : '' )
                        );
                        $i++;
                        endwhile;
                    echo '</li>';
                    }
                    return ob_get_clean();
                }
                /** Call Button Function End */

                echo '<header id="myHeader" class=" d-block cell-12 transition">' .
                '<div class="wrapper d-flex align-items-center justify-content-between">' .
                   brand_logo() .
                    '<div class="quick-links d-flex justify-content-end cell-12 height-auto">'.
                        '<ul class="contact-links d-flex align-items-center justify-content-end m-0 p-0 list-none ">'.
                          '<div class="marquee position-relative"><p style="color:#fff;"><a href="https://itswebsitedeveloper.com/ibistherapeutics/news/">"Mayo Clinic cofounds IBIS for accelerated drug discovery"</a></p></div>'.
                        '</ul>'.
                       '<a class="navbar-toggle" href="javascript:void(0)"><span class="navbar-toggle__icon-bar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </span> </a>'.
                    '</div>' .
                    (
                        my_wp_is_mobile() == 1
                        ? ''
                        : '<div class="main-navigation cell-12 height-auto d-flex justify-content-end position-relative pt-30 transition">' .
                            (
                                has_nav_menu( 'main-navigation' )
                                ? '<nav id="site-navigation" class="" aria-label="' . esc_attr( 'Top Menu', 'twentynineteen' ) . '">' .
                                  main_navigation() .
                               '</nav>'
                                : ''
                            ) .
                            request_button() .
                        '</div>'
                    ) .
                '</div>' .
            '</header>' .

                '<div id="content-area" class="">';
