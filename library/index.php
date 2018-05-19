<?php

get_header(); 

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
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 

		/**
		* Hook - library_action_pagination.
		*
		* @hooked library_default_pagination 
		* @hooked library_numeric_pagination 
		*/
		do_action( 'library_action_pagination' ); 
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
