<?php
wp_enqueue_style( 'parts-front-slider' );

if ( have_rows('banner', 'options') ) {
	function homeBanner() {

		/** banner slider counter */
		$totalSlides = count(get_field('banner', 'options'));
		$sliderCounter = 1 ;
		ob_start();
		echo '<div class="banner position-relative run-slider ">' .
			'<div class="home-slider">';
			while(have_rows('banner', 'options') ) :
				the_row();

				/** banner image */
				$bannerImageVideo = get_sub_field('banner_image_or_video', 'options');
				$select_banner_image = $bannerImageVideo[ 'select_banner_image' ];

				/** banner content */
				$bannerContent = get_sub_field('banner_content', 'options');
				$mainBannerTitle = $bannerContent['main_banner_title'];
				$mainBannerSubTitle = $bannerContent['main_banner_subtitle'];
				$mainBannerContent = $bannerContent['main_banner_content'];
				$bannerLink = $bannerContent['banner_button'];
				if( !empty($bannerLink) ){
					$bannerLinkURL = $bannerLink['url'];
					$bannerLinkTitle = $bannerLink['title'];
					$bannerLinkTarget = $bannerLink['target'] ? 'target="_blank"' : ' ';
				}

				/** for mobile as well as desktop code */
				echo '<div class="home__single--slide ">' .
					(
						$select_banner_image
						? '<div class="home__single--slide-image ">' .
							wp_get_attachment_image( $select_banner_image, 'full' ) .
						'</div>' .
						(
							!empty( $mainBannerTitle || $bannerLink )
							? '<div class="wrapper">' .
								'<div class="home__single--slide-content ">' .
									'<div class="banner-content-wrapper">' .
										// main banner title
										( $mainBannerTitle ? '<h2 class="banner-main-title mb-10">' . $mainBannerTitle . '</h2>' : '' ) .
                    // main banner subtitle
										( $mainBannerSubTitle ? '<h4 class="banner-main-subtitle pb-15 d-inline-block font-normal">' . $mainBannerSubTitle . '</h4>' : '' ) .
										// main banner subtitle
										( $mainBannerContent ? '<p class="banner-main-content">' . $mainBannerContent . '</p>' : '' ) .
										// Banner Button
										(
											!empty( $bannerLink )
											? '<a href="' . $bannerLinkURL . '"
											class="read-more"
											' . $bannerLinkTarget . ' >' .
												'<span>' .
													$bannerLinkTitle .
												'</span>' .
											'</a>'
											: ''
										) .
									'</div>' .
								'</div>' .
							'</div>'
							: ''
						)
						: ''
					) .
				'</div>';

			$sliderCounter++;
			$bannerSliderDuration = '';
			$slideTime = 0;
			endwhile;
			wp_reset_query();
			wp_reset_postdata();
				echo '</div>' .
		'</div>';
		return ob_get_clean();
	}
	echo homeBanner();
}
?>
