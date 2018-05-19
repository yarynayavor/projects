<?php

get_header(); 
if ( true === apply_filters( 'library_filter_frontpage_content_enable', true ) ) : 

/**
 * library_page_section hook
 *
 * @hooked library_page_section -  10
 *
 */
do_action( 'library_page_section' );
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if ( library_is_sidebar_enable() ) {
	get_sidebar();
}

/**
 * library_page_section_end hook
 *
 * @hooked library_page_section_end -  10
 *
 */
do_action( 'library_page_section_end' );
endif;

get_footer();
