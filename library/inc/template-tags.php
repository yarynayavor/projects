<?php

if ( ! function_exists( 'library_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function library_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'library' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

    $comment_meta = '';
	$comment_meta .= '<span class="comments-links">
                      <span class="screen-reader-text">'.esc_html__( 'Comments', 'library' ).'</span> 
                      <a class="comments-number" href="#">';

	$comments_number = get_comments_number();
	if ( '1' === $comments_number ) {
		/* translators: %s: post title */
		$comment_meta .= sprintf( _x( 'Feedback on &ldquo;%s&rdquo;', 'comments title', 'library' ), get_the_title() );
	} else {
		$comment_meta .= 
			sprintf(
				/* translators: 1: number of comments, 2: post title */
				_nx(
					'%1$s Feedback on &ldquo;%2$s&rdquo;',
					'%1$s Feedbacks on &ldquo;%2$s&rdquo;',
					$comments_number,
					'comments title',
					'library'
				),
				number_format_i18n( $comments_number ),
				get_the_title()
			);
	}
    $comment_meta .= '</a></span>';

    if ( 'post' === get_post_type() ) {
    	/* translators: used between list items, there is a space after the comma */
    	$categories_list = get_the_category_list( esc_html__( ', ', 'library' ) );
    	$cat_meta = '';
    	if ( $categories_list && library_categorized_blog() ) {
    		$cat_meta = '<span class="cat-links">' . $categories_list . '</span>'; // WPCS: XSS OK.
    	}
    }

	echo '<span class="posted-on">' . $posted_on . '</span>'. $comment_meta . $cat_meta .'<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'library_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function library_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'library' ) );
		if ( $categories_list && library_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'library' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'library' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'library' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'library' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'library' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function library_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'library_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'library_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so library_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so library_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in library_categorized_blog.
 */
function library_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'library_categories' );
}
add_action( 'edit_category', 'library_category_transient_flusher' );
add_action( 'save_post',     'library_category_transient_flusher' );
