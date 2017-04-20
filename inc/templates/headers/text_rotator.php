<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 6/24/16
 * Time: 1:00 PM
 */


// featured image properties
$page_header_background = reign_get_header_image_background();

// full screen header properties
$is_header_full_screen = reign_is_header_full_screen();
$show_header_breadcrumb = reign_show_header_breadcrumb();
$page_title_before_rotator = rwmb_meta('reign_rotator_text_before');
$page_title_after_rotator = rwmb_meta('reign_rotator_text_after');
$page_rotator_text = rwmb_meta('reign_rotator_text');
$page_custom_title = rwmb_meta('reign_page_custom_title');
$page_custom_subtitle = rwmb_meta('reign_page_custom_subtitle');
$page_header_button_text = rwmb_meta('reign_page_header_button_text');
$page_header_button_link = rwmb_meta('reign_page_header_button_link');

?>

<header id="header" class="header-wrapper home-parallax home-fade dark-bg <?php if( $is_header_full_screen == 0 ) echo 'header-classic' ?>" style="margin-bottom: 20px;position: relative;background-color: black;background: <?php echo $page_header_background; ?>;background-size: cover;">

    <div class="color-overlay"></div>
    <div class="header-wrapper-inner">
        <div class="container">
            <div class="intro">
                <h1>
                    <?php if((isset($page_rotator_text) && $page_rotator_text != '') || (isset($page_title_before_rotator) && $page_title_before_rotator != '') || (isset($page_title_after_rotator) && $page_title_after_rotator != '')): ?>
                        <?php if(isset($page_title_before_rotator) && $page_title_before_rotator != ''): ?>
                            <?php echo $page_title_before_rotator; ?>
                        <?php endif; ?>
                        <?php if(isset($page_rotator_text) && $page_rotator_text != ''): ?>
                            <span class="rotate"><?php echo $page_rotator_text; ?></span>
                        <?php endif; ?>
                        <?php if(isset($page_title_after_rotator) && $page_title_after_rotator != ''): ?>
                            <?php echo $page_title_after_rotator; ?>
                        <?php endif; ?>
                    <?php elseif(isset($page_custom_title) && $page_custom_title != ''): ?>
                        <?php echo $page_custom_title; ?>
                    <?php else : ?>
                        <?php echo reign_get_the_title(); ?>
                    <?php endif; ?>
                </h1>
                <?php if(isset($page_custom_subtitle) && $page_custom_subtitle != ''): ?>
                    <p><?php echo $page_custom_subtitle; ?></p>
                <?php endif; ?>
                <?php if($show_header_breadcrumb == 1): ?>
                    <div class="breadcrumb">
                        <!--                    <a href="#">Home</a> <i class="fa fa-angle-double-right"></i> <a href="#">About us</a>-->

                    </div>
                <?php endif; ?>
                <?php if(isset($page_header_button_text) && $page_header_button_text != ''): ?>
                    <a href="<?php echo ((isset($page_header_button_link) && $page_header_button_link != '') ? $page_header_button_link : '#') ?>" class="btn btn-default-o onPageNav"><?php echo $page_header_button_text; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>