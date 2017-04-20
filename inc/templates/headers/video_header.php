<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 6/21/16
 * Time: 1:39 PM
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

$page_header_youtube_video_url = rwmb_meta('reign_page_header_youtube_video_url');
$page_header_is_video_mute = rwmb_meta('reign_page_header_mute_video');
$page_header_is_video_autoplay = rwmb_meta('reign_page_header_video_autoplay');
$page_header_is_video_loop = rwmb_meta('reign_page_header_loop_video');
$page_header_video_start = rwmb_meta('reign_page_header_video_start');
$page_header_video_end = rwmb_meta('reign_page_header_video_end');


?>
<!-- Header -->
<header id="header" class="header-wrapper <?php if($is_header_full_screen != 1) echo 'header-classic'; ?>  home-parallax home-fade dark-bg bg-10" style="margin-bottom: 20px;position: relative;background-color: black;background: <?php echo $page_header_background; ?>;background-size: cover;">

        <!-- Background Youtube player start -->
        <div id="videoBackground"
             class="overlay"
             data-property="{
                        videoURL:'<?php echo (isset($page_header_youtube_video_url) && $page_header_youtube_video_url != '') ? $page_header_youtube_video_url : 'https://www.youtube.com/watch?v=1ufqweCJm2k'; ?>',
                        containment:'.header-wrapper',
                        startAt:<?php echo (isset($page_header_video_start)) ? $page_header_video_start : 22; ?>,
                        stopAt:<?php echo (isset($page_header_video_end)) ? $page_header_video_end : 290 ?>,
                        mute:<?php echo (isset($page_header_is_video_mute) ? ($page_header_is_video_mute ? 'true' : 'false') : 'false'); ?>,
                        autoPlay:<?php echo (isset($page_header_is_video_autoplay) ? ($page_header_is_video_autoplay ? 'true' : 'false') : 'false'); ?>,
                        loop:<?php echo (isset($page_header_is_video_loop) ? ($page_header_is_video_loop ? 'true' : 'false') : 'false'); ?>,
                        opacity:1,
                        showControls:false,
                        showYTLogo:false,
                        vol:25}"></div>
        <!-- Background Youtube player end -->

        <!-- Youtube controls start-->
        <div class="video-controls-box">
            <div class="container">
                <div class="video-controls">
                    <a id="video-volume" class="fa fa-volume-up" href="#">&nbsp;</a>
                    <a id="video-play" class="fa fa-pause" href="#">&nbsp;</a>
                </div>
            </div>
        </div>
        <!-- Youtube controls end -->


    <div class="color-overlay"></div>
    <div class="header-wrapper-inner">
        <div class="container">

            <div class="intro">
                <h1>
                    <?php if(isset($page_custom_title) && $page_custom_title != ''): ?>
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
            </div><!-- /.intro -->

        </div><!-- /.container -->
    </div><!-- /.header-wrapper-inner -->
</header>
<!-- /Header -->
