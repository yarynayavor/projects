<?php

function library_sidebar_position_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'library_nonce' );
    $stored_sidebar_position = get_post_meta( $post->ID, 'library-sidebar-position', true );

    $sidebar_positions       = library_sidebar_position();
    ?>

    <p>
     <label for="library-sidebar-position" class="library-row-title"><?php esc_html_e( 'Sidebar Position', 'library' )?></label>
     <select name="library-sidebar-position" id="library-sidebar-position">
      <option value=""><?php esc_html_e( 'Default ( to customizer option )', 'library' ); ?></option>

        <?php foreach ( $sidebar_positions as $sidebar_position => $value ) { ?>
         <option value="<?php echo esc_attr( $sidebar_position );?>" <?php if ( isset ( $stored_sidebar_position ) ) selected( $stored_sidebar_position, $sidebar_position ); ?>><?php echo esc_html( $value ); ?></option>
        <?php } ?>
     </select>
    </p>
    <?php
}


/**
 * Saves the sidebar position input
 */
function library_sidebar_layout_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'library_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'library_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'library-sidebar-position' ] ) ) {
        update_post_meta( $post_id, 'library-sidebar-position', sanitize_text_field( $_POST[ 'library-sidebar-position' ] ) );
    }

}
add_action( 'save_post', 'library_sidebar_layout_save' );