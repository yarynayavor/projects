<?php

get_header(); 
do_action( 'library_page_section' );
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Результати пошуку для : %s', 'library' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
	</section><!-- #primary -->

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
