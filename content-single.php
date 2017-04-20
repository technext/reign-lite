<!--Blog Post-->
<!--<div class="col-md-8 col-md-offset-2">-->
    <div <?php post_class('row blog-post'); ?>>
        <div class="col-md-12">
            <?php if(get_the_post_thumbnail_url() != ''): ?>
            <div class="featured-image">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt=""/>
            </div>
            <?php endif; ?>

            <h2 class="post-title">
                <?php the_title(); ?>
            </h2>
            <div class="post-meta">
                by <?php echo get_the_author_link(); ?>
                <span>|</span>
                <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d')); ?>"><?php the_date(); ?></a>
                <span>|</span>
                <?php echo get_comments_number(get_the_ID()); ?> Comments
            </div>

            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
<!--</div>-->
<!--Blog Post end-->