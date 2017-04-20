<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 7/13/16
 * Time: 4:29 PM
 */
?>

<div class="col-sm-6 col-md-6">
    <div <?php post_class('blog-post'); ?>>
        <header>
            <?php if(is_sticky()): ?>
                <div class="sticky-sticker">
                    <?php $sticky_text = get_option('reign_blog_sticky_header_text', 'STICKY'); ?>
                    <span><?php echo $sticky_text; ?></span>
                </div>
            <?php endif; ?>
            <h4 class="date"><?php echo get_the_date('d',$post->ID); ?><br><?php echo get_the_date('M', $post->ID); ?></h4>
            <div class="blog-element">
                <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="">
            </div>
        </header>
        <div class="blog-content">
            <h4><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></h4>
            <div class="post-meta">
                <span>By <a href="<?php echo get_the_author_link($post->ID); ?>"><?php echo get_userdata($post->post_author)->data->user_login; ?></a></span>
                <span><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_comments_number($post->ID).' Comments'; ?></a></span>
            </div>
            <p><?php echo reign_get_excerpt($post, 75, false); ?></p>
        </div>
    </div>
</div>
