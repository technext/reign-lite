<?php
/**
 * Template Name: Widgeted Homepage
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage reign
 * @since Reign 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            if(is_active_sidebar('homepage-content')){
                dynamic_sidebar('homepage-content');
            }
            else {
                ?>
                            <section class="section">
                                <div class="container">
                                    <div class="col-md-8 col-md-offset-2">
                                        <?php
                        if( have_posts() ):
                            // Start the loop.
                            while ( have_posts() ) : the_post();

                                // Include the page content template.
                                get_template_part( 'content', 'page' );

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                                // End the loop.
                            endwhile;
                        else :
                            get_template_part('content', 'none');
                        endif;
                        ?>
                                    </div>
                                </div>
                            </section>
                <?php
            }
            ?>
        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_footer(); ?>