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
$page_custom_title = rwmb_meta('reign_page_custom_title');
$page_custom_subtitle = rwmb_meta('reign_page_custom_subtitle');
$page_header_button_text = rwmb_meta('reign_page_header_button_text');
$page_header_button_link = rwmb_meta('reign_page_header_button_link');

// slider content
$page_header_slider_id = rwmb_meta('reign_header_slider');
$page_header_shortcode = reign_page_header_slider_shortcode($page_header_slider_id);
?>

<header id="header" class="header-wrapper home-parallax home-fade dark-bg <?php if( $is_header_full_screen == 0 ) echo 'slider-classic' ?>" style="margin-bottom: 20px;position: relative;background-color: black;background: <?php echo $page_header_background; ?>;background-size: cover;">
        <?php echo do_shortcode($page_header_shortcode); ?>
</header>