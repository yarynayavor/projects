<?php

get_header(); ?>
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

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title title-404" ><?php esc_html_e( '404', 'library' ); ?></h1>
					<h1 class="page-title"><?php esc_html_e( 'Ой, лишенько :( Сторінки не знайдено.', 'library' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'В цьому розділі нічого не знайдено. Спробуйте використати пошук', 'library' ); ?></p>

					<?php get_search_form();?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/**
 * library_page_section_end hook
 *
 * @hooked library_page_section_end -  10
 *
 */
do_action( 'library_page_section_end' );

get_footer();
