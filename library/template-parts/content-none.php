<?php

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Нічого не знайдено', 'library' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ви готові написати свій перший пост? <a href="%1$s">Почати тут</a>.', 'library' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Пробачте, але нічого не знайдено.', 'library' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'На жаль ми не можемо знайти те, що ви шукаєте, спробуйте скористатись пошуком.', 'library' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
