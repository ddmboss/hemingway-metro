<?php
	// Create Slider

    function ddmboss_slider_template() {

        // Query Arguments
        $args = array(
            'post_type' => 'slides',
            'posts_per_page' => 10
        );

        // The Query
        $the_query = new WP_Query( $args );

        // Check if the Query returns any posts
        if ( $the_query->have_posts() ) {

            // Start the Slider ?>
            <div class="flexslider">
                <ul class="slides">

                    <?php
                    // The Loop
                    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <li>

                        <?php // Check if there's a Slide URL given and if so let's a link to it
                        if ( get_post_meta( get_the_id(), 'ddmboss_slideurl', true) != '' ) { ?>
                            <a href="<?php echo esc_url( get_post_meta( get_the_id(), 'ddmboss_slideurl', true) ); ?>">
                        <?php }

                        // The Slide's Image
                        if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'hemingway-metro-slider' );
							}

                        // Close off the Slide's Link if there is one
                        if ( get_post_meta( get_the_id(), 'ddmboss_slideurl', true) != '' ) { ?>
                            </a>
                        <?php } ?>
                        </li>
                    <?php endwhile; ?>

                </ul><!-- .slides -->
            </div><!-- .flexslider -->

        <?php }

        // Reset Post Data
        wp_reset_postdata();
    }

	// Slider Shortcode

    function ddmboss_slider_shortcode() {
        ob_start();
        ddmboss_slider_template();
        $slider = ob_get_clean();
        return $slider;
    }
    add_shortcode( 'slider', 'ddmboss_slider_shortcode' );

?>
