<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 6/30/16
 * Time: 3:39 PM
 */
$category = wp_get_post_terms(get_the_ID(), 'zion_portfolio_category');
$layout = get_option('reign_portfolio_layout', 'portfolio-boxed-3-column');
//print_r($category);die();
?>
<li data-category="<?php echo $category[0]->slug; ?>" class="<?php echo $category[0]->slug; ?>">
    <a href="<?php echo ($layout == 'portfolio-lightbox') ? get_the_post_thumbnail_url(get_the_ID()) : get_permalink(get_the_ID()); ?>">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="" />
        <div class="portfolio-detail-overlay">
            <div class="middle-align-wrap">
                <div class="middle-align-cell">
                    <h4><?php the_title(); ?></h4>
                    <span><?php echo $category[0]->name; ?></span>
                </div>
            </div>
        </div>
    </a>
</li>
