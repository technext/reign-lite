<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 6/21/16
 * Time: 3:06 PM
 */
?>

<section class="section">
    <div class="container">
        <div class="row">
            <div <?php post_class('post-content'); ?>>
                <?php
                // Post thumbnail.
                //twentyfifteen_post_thumbnail();
                ?>

                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                        <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'reign-lite' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

                    <?php elseif ( is_search() ) : ?>

                        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'reign-lite' ); ?></p>
                        <?php get_search_form(); ?>

                    <?php else : ?>

                        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'reign-lite' ); ?></p>
                        <?php get_search_form(); ?>

                    <?php endif; ?>
                </div><!-- .entry-content -->

                <?php edit_post_link( __( 'Edit', 'reign-lite' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

            </div>
        </div>
    </div>
</section>
