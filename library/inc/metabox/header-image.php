<?php

/**
 * Outputs the content of the sidebar position
 */
function library_header_image_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'library_nonce' );
    $stored_header_image_option = get_post_meta( $post->ID, 'library-header-image', true );

    $header_image_options       = library_header_image();
    ?>

    <p>
     <label for="library-header-image" class="library-row-title"><?php esc_html_e( 'Header Image', 'library' )?></label>
     <select name="library-header-image" id="library-header-image">
      <option value=""><?php esc_html_e( 'Default ( Customizer Header Image )', 'library' ); ?></option>

        <?php foreach ( $header_image_options as $header_image_option => $value ) { ?>
         <option value="<?php echo esc_attr( $header_image_option );?>" <?php if ( isset ( $stored_header_image_option ) ) selected( $stored_header_image_option, $header_image_option ); ?>><?php echo esc_html( $value ); ?></option>
        <?php } ?>
     </select>
    </p>
    <?php
}


/**
 * Saves the sidebar position input
 */
function library_sidebar_header_image_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'library_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'library_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'library-header-image' ] ) ) {
        update_post_meta( $post_id, 'library-header-image', sanitize_text_field( $_POST[ 'library-header-image' ] ) );
    }

}
add_action( 'save_post', 'library_sidebar_header_image_save' );