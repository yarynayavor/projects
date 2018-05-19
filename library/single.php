<?php get_header(); ?>

<?php 
/**
 * library_page_section hook
 *
 * @hooked library_page_section -  10
 *
 */
do_action( 'library_page_section' );?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'single' );

			/**
			* Hook library_action_post_pagination
			*  
			* @hooked library_post_pagination 
			*/
			do_action( 'library_action_post_pagination' );

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

get_footer();
