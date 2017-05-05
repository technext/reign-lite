<?php
/**
 * The Header Template
 **/
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" content="A fat free flat responsive corporate agency templae">
        <meta name="keywords" content="Agency, Corporate, Flat, Responsive">
        <title>
            <?php
                wp_title('|', true, 'left');
            ?>
        </title>
        <?php wp_head(); ?>
    </head>
<!--    --><?php //print_r(get_option('reign_blog_layout'));die(); ?>
    <body <?php body_class(); ?> data-spy="scroll" data-target="#main-nav-collapse" data-offset="100">
        <div class="page-loader" style="display: none;"><div class="loader" style="display: none;">Loading...</div></div>
        <!-- Fixed Top Navigation -->
        <nav id="fixedTopNav" class="navbar navbar-fixed-top main-navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <div class="container">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="ion-drag"></span>
                    </button>

                    <!-- Logo -->
                    <div class="navbar-brand" itemscope itemtype="https://schema.org/Organization">
                        <?php $logo_url = get_theme_mod('reign_logo_url'); ?>
                        <span itemprop="name" class="sr-only"><?php echo strip_tags(bloginfo('title')); ?></span>
                        <a itemprop="url" href="<?php echo home_url(); ?>">
                            <?php
                            if($logo_url) echo '<img src="'.$logo_url.'" alt="SITE LOGO"/>';
                            else echo bloginfo('title');
                            ?>
                        </a>
                    </div><!-- /Logo -->

                </div><!-- /.navbar-header -->

                <!-- Navigation Links -->
                <div class="collapse navbar-collapse" id="main-nav-collapse">
                    <?php reign_wp_primary_nav_menu(); ?>
                </div>

            </div>
        </nav>

    <?php
        $header_type = reign_get_header_type();

        if($header_type == 'featured_image'):
            get_template_part('inc/templates/headers/image_header');
        elseif($header_type == 'gradient_overlay'):
            get_template_part('inc/templates/headers/image_header_gradient_overlay');
        elseif($header_type == 'video_background'):
            get_template_part('inc/templates/headers/video_header');
        else:
            get_template_part('inc/templates/headers/image_header');
        endif;
    ?>