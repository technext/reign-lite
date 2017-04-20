<?php
/**
 * The main template file
 */
?>
<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section id="blog-standard" class="section blog-standard">
            <div class="container">
                <?php if(is_active_sidebar('blog-page-sidebar') && reign_get_blog_sidebar_position() == 'left-sidebar'): ?>
                    <?php get_sidebar(); ?>
                <?php endif; ?>
        <?php echo reign_get_blog_archive_header(reign_get_blog_layout(), is_active_sidebar('blog-page-sidebar')); ?>

                        <?php if ( have_posts() ) : ?>
                            <?php

                            // Start the loop.
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */

                                get_template_part( 'content', get_post_format() );


                                // End the loop.
                            endwhile;
                            if(reign_get_blog_layout() != 'blog-standard') echo '</div>';
                            reign_wp_posts_pagination('', get_option('posts_per_page', 10));

                        // If no content, include the "No posts found" template.
                        else :
                            get_template_part( 'content', 'none' );

                            ?>
                        <?php endif; ?>
                    </div>
        <?php if(reign_get_blog_layout() != 'blog-standard'): ?>
            <?php if(is_active_sidebar('blog-page-sidebar')): ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(is_active_sidebar('blog-page-sidebar') && reign_get_blog_sidebar_position() == 'right-sidebar'): ?>
            <?php get_sidebar(); ?>
        <?php endif; ?>
            </div>
        </section>

    </main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
