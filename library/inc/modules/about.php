<?php

if ( ! function_exists( 'library_add_about_section' ) ) :
  /**
   * Add about section
   *
   *@since library 0.3
   */
  function library_add_about_section() {

    // Check if about is enabled on frontpage
    $about_enable = apply_filters( 'library_section_status', true, 'about_section_enable' );
    if ( true !== $about_enable ) {
      return false;
    }

    // Get about section details
    $section_details = array();
    $section_details = apply_filters( 'library_filter_about_section_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render about section now.
    library_render_about_section( $section_details );
  }
endif;
add_action( 'library_primary_content', 'library_add_about_section', 20 );


if ( ! function_exists( 'library_get_about_section_details' ) ) :
  /**
   * about section details.
   *
   * @since library 0.3
   * @param array $input about section details.
   */
  function library_get_about_section_details( $input ) {
    $options = library_get_theme_options();

    $content = array();
    $id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
    if( !empty ( $id ) ) {
        $args = array(
            'post_type'     => 'page',
            'page_id'       => absint( $id ),
        );
    }
    // Fetch posts.
    if ( ! empty( $args ) ) {
        $posts = get_posts( $args );
        foreach ( $posts as $key => $post ) {
            $page_id = $post->ID;
            $content[0]['sub_title']    = '';
            $content[0]['title']        = get_the_title( $page_id );
            $content[0]['excerpt']      = library_trim_content( 110, $post );
            $content[0]['alt']          = get_the_title( $page_id );
            $content[0]['url']          = get_permalink( $page_id );
            $content[0]['btn_label']    = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'library' );
            $content[0]['btn_target']   = '';

            if ( has_post_thumbnail( $page_id ) ) {
                $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
            }
            $content[0]['img_array'] = '';
            if ( isset( $img_array ) ) {
                $content[0]['img_array'] = $img_array[0];
            }
        }
    }

    if ( empty( $content[0][1]['statistics_title'] ) && empty( $content[0][1]['statistics_value'] ) ){
        $input = "";
    }

    if ( ! empty( $content ) ) {
      $input = $content;
    }
    return $input;
  }
endif;
// about section content details.
add_filter( 'library_filter_about_section_details', 'library_get_about_section_details' );


if ( ! function_exists( 'library_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since library 0.3
   *
   */
   function library_render_about_section( $content_details = array() ) {
        $options          = library_get_theme_options();

        if ( empty( $content_details ) ) {
          return;
        }

        if ( $content_details[0]['img_array'] ) {
          $class = 'two';
        } else {
          $class = 'one';
        }
        ?>
        <section id="welcome-section" class="page-section <?php echo esc_attr( $class );?>-col os-animation">
            <?php foreach ( $content_details as $content ): ?>
                <div class="container">
                    <div class="column-wrapper">
                        <header class="entry-header">
                            <?php if ( ! empty( $content['title'] ) ) : ?>
                                <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                            <?php endif;
                            if ( ! empty( $content['sub_title'] ) ) : ?>
                                <h6 class="entry-subtitle"><?php echo esc_html( $content['sub_title'] ); ?></h6>
                            <?php endif; ?>
                        </header><!-- end .entry-header -->

                        <div class="entry-content">
                            <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                <p><?php echo library_santize_line_break( $content['excerpt'] ); ?></p>
                            <?php endif;
                             if ( ! empty( $content['url'] ) && ! empty( $content['btn_label'] ) ) : ?>
                                <div class="buttons">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" href="<?php echo esc_attr( $content['btn_target'] ); ?>" class="btn btn-blue"><?php echo esc_html( $content['btn_label'] ); ?><i class="fa fa-angle-right"></i></a>
                                </div><!-- end .buttons -->
                            <?php endif; ?>
                        </div><!-- end .entry-content -->
                    </div><!-- end .column-wrapper -->
                    <?php if ( $content['img_array'] ) { ?>
                      <div class="column-wrapper">
                        <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['img_array'] ); ?>"></a>
                      </div>
                    <?php } ?>
                </div><!-- end .container -->
            <?php endforeach; ?>
        </section><!-- end #welcome-section-->
    <?php
    }
endif;