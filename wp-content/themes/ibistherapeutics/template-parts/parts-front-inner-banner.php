<?php

if (has_post_thumbnail( $post->ID ) ):
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );

  echo '<section class="banner-top" style="background-image: url('. $image[0]  .')">'.
    '<div class="wrapper d-flex justify-content-center align-items-center text-center">';
        while (have_posts()) : the_post();
  				echo '<h1 class="text-white mb-0">' . get_the_title() . '</h1>';
  	   endwhile;
    echo '</div>'.
  '</section>';
endif;

?>
