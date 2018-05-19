<?php

if ( ! function_exists( 'library_add_category_blog_three' ) ) :
  /**
   * Add Category Blog three
   *
   *@since library 0.3
   */
  function library_add_category_blog_three() {

    // Check if cat blog three is enabled on frontpage
    $category_blog_one_enable = apply_filters( 'library_section_status', true, 'category_blog_one_enable' );
    if ( true !== $category_blog_one_enable ) {
      return false;
    }

    // Get Category Blog three details
    $section_details = array();
    $section_details = apply_filters( 'library_filter_category_blog_three_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render Category Blog three now.
    library_render_category_blog_three( $section_details );
  }
endif;
add_action( 'library_primary_content', 'library_add_category_blog_three', 20 );


if ( ! function_exists( 'library_get_category_blog_three_details' ) ) :
  /**
   * Category Blog three details.
   *
   * @since library 0.3
   * @param array $input Category Blog three details.
   */
  function library_get_category_blog_three_details( $input ) {
    $options = library_get_theme_options();

    // Category Blog three Type
    $category_blog_one_type  = $options['category_blog_one_type'];
    $category_blog_one_icon  = ! empty( $options['category_blog_one_icon'] ) ? $options['category_blog_one_icon'] : 'fa-snapchat-ghost';

    $content = array();
    $color = array( '#357DF5', '#1483BA', '#9253C8', '#F4BD18', '#14B745', '#FC3E1E' );
    switch ( $category_blog_one_type ) {

        case 'category':
            $taxonomy   = 'category';
            $categories = get_categories();
        break;

        case 'sub-category':
            $taxonomy   = 'category';
            $term       = '';

            if ( isset( $options['category_blog_one_parent_category'] ) ) {
              $term       = absint( $options['category_blog_one_parent_category'] );
            }
            $categories = get_term_children( $term, $taxonomy );
            $i = 1;
            $color_count = 0;
            foreach( $categories as $category ){
                if ( $color_count == 6 ) $color_count =1;
                $category = get_term_by( 'id', $category, $taxonomy );
                $content[$i]['url']     = get_term_link( $category->slug, $taxonomy );
                $content[$i]['title']   = $category->name;
                $content[$i]['icon']    = esc_attr__( 'fa-snapchat-ghost', 'library');
                $content[$i]['color']   = $color[$color_count];
                $i++; $color_count++;
            }
        break;

        default:
        break;
    }

    if ( 'sub-category' != $category_blog_one_type ) {
        $i = 1;
        $color_count = 0;
        if ( ! empty( $categories ) ) {
          foreach( $categories as $category ){
              if ( $color_count == 6 ) $color_count =1;
              $content[$i]['url']     = get_term_link( $category->slug, $taxonomy );
              $content[$i]['title']   = $category->name;
              $content[$i]['icon']    = $category_blog_one_icon;
              $content[$i]['color']   = $color[$color_count];
              $i++; $color_count++;
          }
        }
        
    }

    if ( ! empty( $content ) ) {
      $input = $content;
    }
    return $input;
  }
endif;
// Category Blog three content details.
add_filter( 'library_filter_category_blog_three_details', 'library_get_category_blog_three_details' );


if ( ! function_exists( 'library_render_category_blog_three' ) ) :
  /**
   * Start category blog three section 
   *
   * @return string category blog three content
   * @since library 0.3
   *
   */
   function library_render_category_blog_three( $content_details = array() ) {
        $options                        = library_get_theme_options();
        $category_blog_one_title        = ! empty( $options['category_blog_one_title'] ) ? $options['category_blog_one_title'] : '';
        $category_blog_one_layout       = ! empty( $options['category_blog_one_layout'] ) ? $options['category_blog_one_layout'] : 6;
        $category_blog_one_dragable     = ( $options['category_blog_one_dragable'] == true ) ? 'true' : 'false';
        $category_blog_one_autoplay     = ( $options['category_blog_one_autoplay'] == true ) ? 'true' : 'false';
        ?>  
        <section id="popular-courses" class="page-section no-padding-bottom slider os-animation">
            <div class="container">
                <header class="entry-header">
                    <?php if ( ! empty( $category_blog_one_title ) ) : ?>
                        <h2 class="entry-title"><?php echo esc_html( $category_blog_one_title ); ?></h2>  
                    <?php endif; ?>
                </header><!-- end .entry-header -->

                <div class="entry-content regular statistics" data-slick='{"slidesToShow": <?php echo absint( $category_blog_one_layout ); ?>, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": false, "arrows":true, "draggable": <?php echo esc_attr( $category_blog_one_dragable ); ?>, "autoplay": <?php echo esc_attr( $category_blog_one_autoplay ); ?> }'>

                    <?php foreach( $content_details as $content ) : ?>
                        <div class="slider-item">
                            <div class="statistics-details" style="background-color: <?php echo esc_attr( $content['color'] ); ?>;">
                                <i class="fa <?php echo esc_attr( $content['icon'] ); ?>"></i>
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a>
                            </div><!-- end .statistics-details -->
                        </div><!-- end .slider-item -->
                    <?php endforeach; ?>

                </div><!-- end .entry-content -->
            </div><!-- end .container -->
        </section><!-- end #recent-courses-slider -->
<?php 
    }
endif;