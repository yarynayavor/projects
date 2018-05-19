<?php
/**
* library_footer_content hook
*
* @hooked library_add_partner - 10
*
*/
do_action( 'library_footer_content' );

/**
* library_content_end hook
*
* @hooked library_content_end -  100
*
*/
do_action( 'library_content_end' );


/**
* library_footer hook
*
* @hooked library_footer_start -  10
* @hooked library_footer -  30
* @hooked library_copyright -  40
* @hooked library_footer_end -  100
*
*/
do_action( 'library_footer' );


/**
* library_back_to_top hook
*
* @hooked library_back_to_top -  10
*
*/
do_action( 'library_back_to_top' );

wp_footer(); ?>

</body>
</html>
