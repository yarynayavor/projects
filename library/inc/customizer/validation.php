<?php

/**
 * Check the value of long excerpt
 *
 * @since library 0.3
 * @return string A source value for use
 */
function library_validate_long_excerpt( $validity, $value ){
  $value = intval( $value );
  if ( empty( $value ) || ! is_numeric( $value ) ) {
    $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'library' ) );
  } elseif ( $value < 5 ) {
    $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'library' ) );
  } elseif ( $value > 100 ) {
    $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'library' ) );
  }
  return $validity;
}


/**
 * Check the value of short excerpt
 *
 * @since library 0.3
 * @return string A source value for use
 */
function library_validate_short_excerpt( $validity, $value ){
  $value = intval( $value );
  if ( empty( $value ) || ! is_numeric( $value ) ) {
    $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'library' ) );
  } elseif ( $value < 5 ) {
    $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'library' ) );
  } elseif ( $value > 25 ) {
    $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 25', 'library' ) );
  }
  return $validity;
}


/**
 * Check the value of the Sections->Tob Bar->Number of Fields
 *
 * @since library 0.3
 *
 * @param obj $validity A source size value for use in a 'sizes' attribute.
 * @param int $value    Value passed in the input field
 *
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function library_top_bar_field_number( $validity, $value ){
  $value = intval( $value );
  if ( empty( $value ) || ! is_numeric( $value ) ) {
      $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'library' ) );
  } elseif ( $value < 1 ) {
      $validity->add( 'min_value', esc_html__( 'Minimum value is 1', 'library' ) );
  } elseif ( $value > 3 ) {
      $validity->add( 'max_value', esc_html__( 'Maximum value is 3', 'library' ) );
  }
  return $validity;
}


/**
 * Check the value for number of slider to show
 *
 * @since library 0.3
 * @return string A source value for use
 */
function library_validate_no_of_slider( $validity, $value ){
       $value = intval( $value );
   if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'library' ) );
   } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of slide is 1', 'library' ) );
   } elseif ( $value > 5 ) {
       $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of slide is 5', 'library' ) );
   }
   return $validity;
}

/**
 * About section statistics 
 * 
 * @since library 0.3
 * @return validation for max and min no of statistics details
 */
function library_validate_no_of_about_statistics( $validity, $value ){
       $value = intval( $value );
   if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'library' ) );
   } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of statistics is 1', 'library' ) );
   } elseif ( $value > 6 ) {
       $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of statistics is 6', 'library' ) );
   }
   return $validity;
}


/**
 * Category four blog number of posts validation
 * @return validation for max and min no of statistics details
 */
function library_validate_cat_blog_four_post_num_range( $validity, $value ){
  $value = intval( $value );
  if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'library' ) );
  } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_posts', esc_html__( 'Minimum number of posts is 1', 'library' ) );
  } elseif ( $value > 15 ) {
       $validity->add( 'max_no_of_posts', esc_html__( 'Maximum number of posts is 15', 'library' ) );
  }
  return $validity;
}


/**
 * category blog one no. of articels
 * 
 * @since library 0.3
 * @return validation for max and min no of articles
 */
function library_validate_category_blog_one_count( $validity, $value ){
       $value = intval( $value );
   if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'library' ) );
   } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of article is 1', 'library' ) );
   } elseif ( $value > 12 ) {
       $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of articles is 12', 'library' ) );
   }
   return $validity;
}

/**
 * category blog two no. of articels
 * 
 * @since library 0.3
 * @return validation for max and min no of articles
 */
function library_validate_category_blog_two_count( $validity, $value ){
       $value = intval( $value );
   if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'library' ) );
   } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of article is 1', 'library' ) );
   } elseif ( $value > 12 ) {
       $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of articles is 12', 'library' ) );
   }
   return $validity;
}


/**
 * partners no. of list
 * 
 * @since library 0.3
 * @return validation for max and min no of Lists
 */
function library_validate_partner_count( $validity, $value ){
       $value = intval( $value );
   if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'library' ) );
   } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of list is 1', 'library' ) );
   } elseif ( $value > 15 ) {
       $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of Lists is 15', 'library' ) );
   }
   return $validity;
}