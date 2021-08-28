<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();


echo '<div class="content default-page">';
		echo '<div class="wrapper">' .
			'<div class="mid">' .
				'<div class="post" id="post-' . get_the_ID() .'">';
					if (have_posts()) : while (have_posts()) : the_post();
						echo '<h1>' . get_the_title() . '</h1>'.
						'<div class="entry">';
							the_content();
							wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
						echo '</div>';
					   endwhile;
						wp_reset_query();
					echo '</div>';
					edit_post_link('Edit this entry.', '<p>', '</p>');
				echo '</div>';
				// get_sidebar();
			echo '</div>' .
		'</div>';
	endif;
get_footer();
