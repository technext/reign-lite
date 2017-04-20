<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 7/13/16
 * Time: 4:10 PM
 */
?>

<div <?php post_class('row blog-post'); ?>>
    <div class="col-md-12">
        <?php if(get_the_post_thumbnail_url() != ''): ?>
            <div class="featured-image">
                <?php if(is_sticky()): ?>
                    <div class="sticky-sticker">
                        <?php $sticky_text = get_option('reign_blog_sticky_header_text', 'STICKY'); ?>
                        <span><?php echo $sticky_text; ?></span>
                    </div>
                <?php endif; ?>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt=""/>
            </div>
        <?php endif; ?>

        <h2 class="post-title">
            <a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="post-meta">
            by <?php echo get_the_author_link(); ?>
            <span>|</span>
            <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d')); ?>"><?php the_date(); ?></a>
            <span>|</span>
            <?php echo get_comments_number(get_the_ID()); ?> Comments
        </div>

        <div class="post-content">
            <?php the_excerpt(); ?>
        </div>

        <div class="read-more">
            <a href="<?php echo get_permalink(get_the_ID()); ?>"><i class="fa fa-angle-double-right"></i> Read More</a>
        </div>
    </div>
</div>
