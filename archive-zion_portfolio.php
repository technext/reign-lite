<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 6/29/16
 * Time: 1:46 PM
 */
get_header();

$portfolio_categories = get_terms(array(
    'taxonomy'              => 'zion_portfolio_category',
    'hide_empty'            => true
));
//print_r($portfolio_categories);die();
$layout = get_option('reign_portfolio_layout', 'portfolio-boxed-3-column');
$content_wrapper_classes = array();
$content_wrapper_classes[] = 'portfolio-grid';
if($layout == 'portfolio-lightbox' || $layout == 'portfolio-boxed-2-column' || $layout == 'portfolio-boxed-3-column'){
    $content_wrapper_classes[] = 'container';
}

if($layout == 'portfolio-boxed-2-column' || $layout == 'portfolio-wide-2-column'){
    $content_wrapper_classes[] = 'two-col';
}
else if($layout == 'portfolio-boxed-3-column' || $layout == 'portfolio-lightbox' || $layout == 'portfolio-wide-3-column'){
    $content_wrapper_classes[] = 'three-col';
}


?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section id="portfolio" class="section portfolio">
            <?php if(have_posts()): ?>
            <div class="container">
                <div class="section-content">
                    <div class="main_content">
                        <div class="isotop-filter" id="filters">
                            <button type="button" class="btn btn-isotop is-checked" data-filter="*">All</button>
                            <?php foreach($portfolio_categories as $category): ?>
                                <button type="button" class="btn btn-isotop" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>  <!-- main_content -->
                </div>
            </div>
            <div class="<?php echo implode(' ', $content_wrapper_classes); ?>">
                <ul id="da-thumbs" class="da-thumbs isotope <?php echo (($layout == 'portfolio-lightbox') ? 'lightbox-gallery' : ''); ?>">
                    <?php while (have_posts()): the_post(); ?>
                        <?php get_template_part('content', 'zion_portfolio'); ?>
                    <?php endwhile; ?>
                </ul>
            </div>
                <?php reign_wp_posts_pagination(); ?>
            <?php else: ?>
                <?php get_template_part('content', 'none'); ?>
            <?php endif; ?>
        </section>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
