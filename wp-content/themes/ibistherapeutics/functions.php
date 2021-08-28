<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/thedmes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
include ('svg-icons.php');

if ( version_compare( $GLOBALS['wp_version'], '5.2.4', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
    return;
}



/**
 * Fire on the initialization of WordPress.
 */
function wp_mobile_detection_function() {
	/** to detect mobile*/
	function my_wp_is_mobile() {
			if( wp_is_mobile() ){
			static $is_mobile;
			if ( isset($is_mobile) )
				return $is_mobile;
			if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
				$is_mobile = false;
			} elseif (
				strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
					$is_mobile = true;
			} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
					$is_mobile = true;
			} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
				$is_mobile = false;
			} else {
				if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) {
				$is_mobile = 'ie11';
			} else {
				$is_mobile = false;
			}
			}
			return $is_mobile;
		}
	}
}
add_action( 'init', 'wp_mobile_detection_function' );

function wp_IE_detection_function(){
	function my_wp_is_IE() {
		if( wp_is_mobile() ){
		} else {
			static $is_IE;
			if ( isset($is_IE) )
				return $is_IE;
			if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
				$is_IE = false;
			} elseif (
				strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
					$is_IE = false;
			} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
					$is_IE = false;
			} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
				$is_IE = false;
			} else {
				if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) {
				$is_IE = 'ie11';
			} else {
				$is_IE = false;
			}
			}
			return $is_IE;
		}
	}
}
add_action( 'init', 'wp_IE_detection_function' );


/** placeholder image function */
function placeholder_image($attr = ''){
	ob_start();
	echo '<img class="' . ( my_wp_is_IE() == 'ie11' ? ' skip-lazy ' : '' ) . '" src="' . get_template_directory_uri() .'/images/placeholder-image.jpg" alt="' . wp_strip_all_tags( $attr ) . '" />';
	return ob_get_clean();
}


/** wp image function */
function wp_image($imgID = '', $size = 'large', $classes = '' ){
	ob_start();
	$webPUrl = wp_get_attachment_image_url( $imgID, $size ) . '.webp';
	$uploadedfile=parse_url($webPUrl);
	$fileUrl =  $_SERVER['DOCUMENT_ROOT'] . $uploadedfile['path'];
    $path_info = pathinfo( wp_get_attachment_image_url( $imgID, $size ) );
    $imageExt = $path_info['extension'];
	echo '<picture class="cell-12 h-100 ">' .
        (
            file_exists($fileUrl)
            ? (
                $size == 'full'
                ? '<source type="image/webp" media="(min-width:320px)" srcset="'. wp_get_attachment_image_url( $imgID, $size ) . '.webp">'
                : ''
            ) .
            (
                $size == 'large'
                ? '<source type="image/webp" media="(min-width:320px)" srcset="'. wp_get_attachment_image_url( $imgID, 'large' ) . '.webp">'
                : ''
            ) .
            (
                $size == 'medium_large'
                ? '<source type="image/webp" media="(min-width:640px)" srcset="'. wp_get_attachment_image_url( $imgID, 'medium_large' ) . '.webp">' .
                '<source type="image/webp" media="(min-width:320px)" srcset="'. wp_get_attachment_image_url( $imgID, 'medium' ) . '.webp">'
                : ''
            ) .
            '<source type="image/webp" media="(min-width:320px)" srcset="'. wp_get_attachment_image_url( $imgID, 'medium' ) . '.webp">'
            : ''
        ) .
        (
            $size == 'full'
            ? '<source type="image/' . $imageExt . '" media="(min-width:320x)" srcset="'. wp_get_attachment_image_url( $imgID, $size ) . '">'
            : ''
        ) .
        (
            $size == 'large'
            ? '<source type="image/' . $imageExt . '" media="(min-width:320px)" srcset="'. wp_get_attachment_image_url( $imgID, 'large' ) . '">'
            : ''
        ) .
        (
            $size == 'medium_large'
            ? '<source type="image/' . $imageExt . '" media="(min-width:640px)" srcset="'. wp_get_attachment_image_url( $imgID, 'medium_large' ) . '">' .
            '<source type="image/' . $imageExt . '" media="(min-width:320px)" srcset="'. wp_get_attachment_image_url( $imgID, 'medium' ) . '">'
            : ''
        ) .
        '<source type="image/' . $imageExt . '" media="(min-width:650px)" srcset="'. wp_get_attachment_image_url( $imgID, $size ) . '">' .
        wp_get_attachment_image( $imgID, $size, '', array( "class" => "attachment-$size size-$size $classes" ) ) .
    '</picture>';

	return ob_get_clean();
}

/** wp icon function **/
function wp_icon( $wp_icon, $classes="" ){
	ob_start();
        $context = stream_context_create(
            array(
                "http" => array(
                    "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                )
            )
        );
        $wp_iconSVG = file_get_contents( $wp_icon , false, $context);
        echo $wp_iconSVG;
	return ob_get_clean();
}


function new_excerpt_more($more) {
    return ' <p><a class="read-more" href="' . get_permalink(get_the_ID()) . '"><span>' . __('Read Full Post', 'your-text-domain') . '</span></a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');


if ( ! function_exists( 'twentynineteen_setup' ) ) :

function twentynineteen_setup() {

    load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1568, 9999 );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(
        array(
            'main-navigation' => __( 'Primary', 'twentynineteen' ),
        )
    );


    /* Footer logo*/
		function footer_logo($wp_customize) {
		    // add a setting
		    $wp_customize->add_setting('footer_logo');
		    // Add a control to upload the hover logo
		    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
		        'label' => 'Footer Logo',
		        'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
		        'settings' => 'footer_logo',
		        'priority' => 9 // show it just below the custom-logo
		    )));
		}
		add_action('customize_register', 'footer_logo');

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    /**
		 * Add support for core custom logo.
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
        add_theme_support(
            'custom-logo',
            array(
                'flex-width'  => false,
                'flex-height' => false,
            )
        );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles.
    add_editor_style( 'style-editor.css' );

}
endif;
add_action( 'after_setup_theme', 'twentynineteen_setup' );

if (function_exists('add_image_size')) {
    add_image_size('staff-thumb', 400, 450, true);
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer Menu', 'twentynineteen' ),
			'id'            => 'footer-menu',
			'description'   => __( 'Appears in the footer of the site.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title text-brand-primary mb-10">',
			'after_title'   => '</h4>',
		)
	);

}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function twentynineteen_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'twentynineteen_content_width', 640 );
}
add_action( 'after_setup_theme', 'twentynineteen_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function site_styles() {
    //wp_enqueue_style( 'twentynineteen-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

    if( is_front_page() ){
        wp_enqueue_style( 'ibistherapeutics-style', get_template_directory_uri() . '/assets/css/style.css' , array(), wp_get_theme()->get( 'Version' ) );
    } else {
        wp_enqueue_style( 'ibistherapeutics-style', get_template_directory_uri() . '/assets/css/inner-styles.css' , array(), wp_get_theme()->get( 'Version' ) );
    }
    wp_style_add_data( 'twentynineteen-style', 'rtl', 'replace' );

    if ( has_nav_menu( 'menu-1' ) ) {
        wp_enqueue_script( 'twentynineteen-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.0', true );
        wp_enqueue_script( 'twentynineteen-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.0', true );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

  	wp_enqueue_style( 'all-default', get_theme_file_uri() . '/assets/css/all-default.css' );
  	wp_enqueue_style( 'aos-default', get_theme_file_uri() . '/assets/css/aos.css' );
}
add_action( 'wp_enqueue_scripts', 'site_styles' );
//add_action( 'get_footer', 'site_styles' );

function site_script() {
    wp_enqueue_script('jquery');
    wp_script_add_data( 'jquery', 'rtl', 'replace' );
    wp_enqueue_script( 'slick-script', get_theme_file_uri() . '/js/slick.min.js', array(), wp_get_theme()->get( 'Version' ) , true );
    wp_enqueue_script( 'matchheight-script', get_theme_file_uri() . '/js/jquery.matchheight.min.js', array(), wp_get_theme()->get( 'Version' ) , true );
    wp_enqueue_script( 'general-script', get_theme_file_uri() . '/js/general.js', array(), wp_get_theme()->get( 'Version' ) , true );
    wp_enqueue_script( 'aos-script', get_theme_file_uri() . '/js/aos.js', array(), wp_get_theme()->get( 'Version' ) , true );
    // wp_enqueue_script( 'skrollr-script', get_theme_file_uri() . '/js/skrollr.min.js', array(), wp_get_theme()->get( 'Version' ) , true );
    wp_register_script( 'home-banner-script', get_theme_file_uri() . '/js/home-banner-functions.js', array(), wp_get_theme()->get( 'Version' ) , true );

}
add_action( 'wp_enqueue_scripts', 'site_script' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentynineteen_skip_link_focus_fix() {
    // The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
?>
<script>
    /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
</script>
<?php
}
add_action( 'wp_print_footer_scripts', 'twentynineteen_skip_link_focus_fix' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/** ACF Options page Single choice */
/*if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}*/


/* ACF Options page Multiple choices */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Options',
        'menu_title'	=> 'Theme options',
        'menu_slug' 	=> 'theme-general-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Options',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Options',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Social Options',
        'menu_title'	=> 'Social',
        'parent_slug'	=> 'theme-general-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme 404 Options',
        'menu_title'	=> '404',
        'parent_slug'	=> 'theme-general-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme General up',
        'menu_title'	=> 'General',
        'parent_slug'	=> 'theme-general-options',
    ));
	acf_add_options_sub_page(array(
        'page_title' 	=> 'Home Slider',
        'menu_title'	=> 'Home Slider',
        'parent_slug'	=> 'theme-general-options',
    ));
}

/* section wise css */
add_action( 'init', 'action__init' );


function action__init() {

    /* scripts */
    wp_register_script( 'isotop-lib', get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ), 'init' );
    wp_register_script( 'isotop-function', get_stylesheet_directory_uri() . '/js/isotop-function.js', array( 'isotop-lib' ), 'init' );

    wp_register_script( 'patient-intake-function', get_stylesheet_directory_uri() . '/js/patient-intake-function.js', array( 'jquery' ), 'init' );
}


/** svg file upload permission */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Enqueue SVG javascript and stylesheet in admin
 * @author fadupla
 */

function fadupla_svg_enqueue_scripts( $hook ) {
    wp_enqueue_style( 'fadupla-svg-style', get_theme_file_uri( 'assets/css/svg.css' ) );
    wp_enqueue_script( 'fadupla-svg-script', get_theme_file_uri( '/js/svg.js' ), 'jquery' );
    wp_localize_script( 'fadupla-svg-script', 'script_vars',
                       array( 'AJAXurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'admin_enqueue_scripts', 'fadupla_svg_enqueue_scripts' );


/**
 * Ajax get_attachment_url_media_library
 * @author fadupla
 */

/** Admin Logo */
function my_login_logo() { ?>
<style type="text/css">
    #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/admin-logo.png);
        height:100px;
        width:100%;
        background-size: contain;
        background-repeat: no-repeat;
    }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return site_url();
}

function cptui_register_my_cpts() {

 //  /**
 // * Post Type: Testimonials.
 // */
 //
 //  $labels = array(
 //      "name" => __( "Testimonials" ),
 //      "singular_name" => __( "Testimonia" ),
 //  );
 //
 //  $args = array(
 //      "label" => __( "Testimonials" ),
 //      "labels" => $labels,
 //      "description" => "",
 //      "public" => true,
 //      "publicly_queryable" => true,
 //      "show_ui" => true,
 //      "delete_with_user" => false,
 //      "show_in_rest" => true,
 //      "rest_base" => "",
 //      "rest_controller_class" => "WP_REST_Posts_Controller",
 //      "has_archive" => true,
 //      "show_in_menu" => true,
 //      "show_in_nav_menus" => true,
 //      "exclude_from_search" => false,
 //      "capability_type" => "post",
 //      "map_meta_cap" => true,
 //      "hierarchical" => false,
 //      "rewrite" => array( "slug" => "testimonial", "with_front" => true ),
 //      "query_var" => true,
 //      "supports" => array( "title", "editor", "thumbnail", "excerpt" ),
 //  );
 //
 //  register_post_type( "testimonial", $args );

}

add_action( 'init', 'cptui_register_my_cpts' );

/** Social Media Function Start */
function social_media_options(){
    ob_start();
    global $facebook;
    global $insta;
    global $twitter;
    global $youtube;
    global $linkedin;
    global $yelp;
    if( have_rows('social_media', 'options') ){
        echo '<div class="socialmedialinks"><ul class="justify-content-start">';
            while ( have_rows('social_media', 'options')) : the_row();
            $icon = get_sub_field('social_media_name', 'options');
            echo '<li class="p-0">' .
                    '<a href="' . get_sub_field('social_media_link', 'options') . '" target="_blank" class="' . get_sub_field('social_media_name', 'options') . '">';
                        if($icon == "facebook"){
                            echo $facebook;
                        } else if($icon == "insta") {
                            echo $insta;
                        } else if($icon == "twitter") {
                            echo $twitter;
                        } else if($icon == "youtube") {
                            echo $youtube;
                        } else if($icon == "linkedin") {
                            echo $linkedin;
                        } else if($icon == "yelp") {
                            echo $yelp;
                        }
                    echo '</a>' .
                '</li>';
            endwhile;
        echo '</ul></div>';
    }
    return ob_get_clean();
}
/** Social Media Function End */

/** stop autoupdate wp-scss plugin  */
function my_filter_plugin_updates( $value ) {
   if( isset( $value->response['WP-SCSS-1.2.4/wp-scss.php'] ) ) {
      unset( $value->response['WP-SCSS-1.2.4/wp-scss.php'] );
    }
    return $value;
 }
 add_filter( 'site_transient_update_plugins', 'my_filter_plugin_updates' );

/** main navigation */
function main_navigation() {
    ob_start();
    wp_nav_menu(
        array(
            'theme_location' => 'main-navigation',
            'menu_class' => 'nav_menu',
        )
    );
    return ob_get_clean();
}


/* site url for terms of use and privacy policy page */
function siteUrlFunction(){
	$siteUrlHtml = '<a class="link" href="' . site_url() . '">' . get_bloginfo( 'name' ) . '</a>';
	return $siteUrlHtml;
}
add_shortcode('site-url', 'siteUrlFunction');

/* site name for terms of use and privacy policy page */
function siteNameFunction(){
	$siteNameHTML = get_bloginfo( 'name' );
	return $siteNameHTML;
}
add_shortcode('site-name', 'siteNameFunction');



 /** Location Custom Title */
 function locationCustomTitle(){
		 ob_start();
				 $customTitle = get_field('location_title','options');
				 if( $customTitle ){
						 echo '<h5><a href="' . get_field('location_map_link','options') . '" target="_blank">' . $customTitle . '</a></h5>';
				 }
		 return ob_get_clean();
 }
 add_shortcode('location-custom-title', 'locationCustomTitle');

/** Location address */
function locationAddress(){
	 ob_start();
			 $locationAddress = get_field('location_address','options');
			 $locationMapLink = get_field('location_map_link','options');
			 if( $locationAddress ){
					 echo '<p class="d-block" data-match-height="loc-address" ><a href="'. $locationMapLink .'" target="_blank">' . $locationAddress . '</a></p>';
			 }
	 return ob_get_clean();
}
add_shortcode('location-address', 'locationAddress');

/** Location Phone Number */
function locationPhoneNumber(){
	 ob_start();
			 $locationPhoneNumber = get_field('location_phone','options');
			 if( $locationPhoneNumber ){
					 echo '<p class="call mb-0 d-block"><a href="tel:' . preg_replace('/[^0-9]/', '', $locationPhoneNumber ) . '">' . $locationPhoneNumber . '</a></p>';
			 }
	 return ob_get_clean();
}
add_shortcode('location-phone', 'locationPhoneNumber');


function locationHours() {
	 ob_start();
	 $locationWorkingHours = get_field('location_hours','options');
	 if( $locationWorkingHours ){
			 echo '<p class="mb-0 d-block">' . $locationWorkingHours . '</p>';
	 }
	 return ob_get_clean();
}
add_shortcode('location-hours', 'locationHours');


function locationEmail() {
	 ob_start();
	 $locationEmail = get_field('location_email','options');
	 if( $locationEmail ){
			 echo '<p class="mb-0 d-block"><a href="mailto:'.  $locationEmail.'">' . $locationEmail . '</a></p>';
	 }
	 return ob_get_clean();
}
add_shortcode('location-email', 'locationEmail');

function locationFax() {
	 ob_start();
	 $locationFax = get_field('location_fax','options');
	 if( $locationFax ){
			 echo '<p class="mb-0 d-block"><span>F: </span><a href="fax:' . preg_replace('/[^0-9]/', '', $locationFax ) . '">' . $locationFax . '</a></p>';
	 }
	 return ob_get_clean();
}
add_shortcode('location-fax', 'locationFax');

/** location map function will display map or custom map in footer, contact page, location single page */
function locationMap(){
    ob_start();

    echo '<div class="location-map cell-12">' .
        get_field( 'address_map_iframe' ,'options') .
    '</div>' ;

    return ob_get_clean();
}
add_shortcode('location-map', 'locationMap');


/** footer navigation */
function footer_navigation() {
    ob_start();

    if ( is_active_sidebar( 'footer-menu' ) ) {
        dynamic_sidebar( 'footer-menu' );
    }

    return ob_get_clean();
}
add_shortcode('footer-navigation', 'footer_navigation');

/** Footer Logo Function Start */
function footer_logo_new(){
    ob_start();
        if( has_custom_logo() ){
            $footerLogoID = attachment_url_to_postid( get_theme_mod( 'footer_logo' ) ) ; // Footer Logo ID
            $footerLogoImage = wp_get_attachment_image( $footerLogoID ,'large', '', ["class" => "footer-logo transition"] ); //Footer Logo Image

            echo '<div class="footer-logo position-relative transition">' .
                '<a href="' . get_option('home') . '" class="d-block transition position-relative">' .
                    ( $footerLogoID ? $footerLogoImage : '' ) .
                '</a>' .
            '</div>';
        }
    return ob_get_clean();
}

// request button
function request_button() {
	ob_start();

	$link = get_field('header_button','options');
	if( $link ) {
	    $link_url = $link['url'];
	    $link_title = $link['title'];
	    $link_target = $link['target'] ? $link['target'] : '_self';

	    echo '<a class="read-more hvr-push" href="'. esc_url( $link_url ) .'" target="'. esc_attr( $link_target ) .'"><span>'. esc_html( $link_title ) .'</span></a>';
		}
	return ob_get_clean();
}
