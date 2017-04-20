<?php if(get_the_content() != ''): ?>
    <div class="post-content <?php post_class(); ?>">
        <?php the_content(); ?>
    </div>
<?php else : ?>
<section class="section">
    <div class="container">
        <div class="row">
            <div <?php post_class('post-content'); ?>>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
