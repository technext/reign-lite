<?php
/*
Plugin Name: Z!ON Slider
Plugin URI: #
Description: This is a Slider plugin
Author: Aqib Ashef
Version: 1.0
Author URI: http://aqibashef.me
*/


/**
 * returns the header image background
 * @return string
 */
function zion_get_header_image_background($featured_image_url = ''){
    // featured image properties
    $page_header_background = '#cccccc';
    if($featured_image_url != ''){
        $page_header_background = "url('".$featured_image_url."')";
    }
    return $page_header_background;
}

function create_zion_slider_post_type(){
    register_post_type('zion_slide', array(
        'labels'                => array(
            'name'                      => 'Z!ON Slides',
            'add_new'                   => 'Add New',
            'add_new_item'              => 'Add New Slide',
            'edit_item'                 => 'Edit Slide',
            'new_item'                  => 'New Slide',
            'view_slider'               => ''
        ),
        'public'                => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'supports'              => array('title', 'thumbnail')
    ));

    register_taxonomy('zion_slider', 'zion_slide',array(
        'labels'                => array(
            'name'                      => 'Z!ON Sliders',
            'add_new'                   => 'Add New',
            'add_new_item'              => 'Add New Slider',
            'edit_item'                 => 'Edit Slider',
            'new_item'                  => 'New Slider',
            'view_item'                 => ''
        ),
        'public'                => true,
        'hierarchical'          => true
    ));
}
add_action('init', 'create_zion_slider_post_type');

function setup_zion_meta_box($meta_boxes){
    $meta_boxes[] = array(
        'title'             => 'Title',
        'post_types'        => 'zion_slide',
        'fields'            => array(
            array(
                'id'                => 'title_text',
                'name'              => 'Title Text',
                'type'              => 'text'
            ),
            array(
                'id'                => 'subtitle_text',
                'name'              => 'Subtitle Text',
                'type'              => 'text'
            )
        )
    );
    $meta_boxes[] = array(
        'title'             => 'Call To Action Button',
        'post_types'        => 'zion_slide',
        'fields'            => array(
            array(
                'id'                => 'button_text',
                'name'              => 'Button Text',
                'type'              => 'text'
            ),
            array(
                'id'                => 'button_url',
                'name'              => 'Button URL',
                'type'              => 'text'
            )
        )
    );
    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'setup_zion_meta_box');

function zion_slider_shortcode($atts = array(), $content = null){
    extract(
        shortcode_atts(
            array(
                'id'                => 0
            ),
            $atts
        )
    );
    $tax_query = array();
    if($id !=  0){
        $tax_query = array(
            array(
                'taxonomy'          => 'zion_slider',
                'field'             => 'id',
                'terms'             => $id,
                'include_children'  => false
            )
        );
    }

    $post_args = array(
        'post_type'                 => 'zion_slide',
        'numberposts'               => -1
    );
    if($id != 0){
        $post_args['tax_query'] = $tax_query;
    }
    $slides = get_posts($post_args);
//    print_r($slides);die();

    // full screen header properties
    $is_header_full_screen = reign_is_header_full_screen();
    $show_header_breadcrumb = reign_show_header_breadcrumb();
    $page_custom_title = rwmb_meta('reign_page_custom_title');
    $page_custom_subtitle = rwmb_meta('reign_page_custom_subtitle');
    $page_header_button_text = rwmb_meta('reign_page_header_button_text');
    $page_header_button_link = rwmb_meta('reign_page_header_button_link');

// slider content
    $page_header_slider_id = rwmb_meta('reign_header_slider');
    ob_start();
    ?>
    <?php if(isset($slides) && count($slides) > 0) :?>
        <div class="header-wrapper-inner flexslider">
            <ul class="slides">
                <?php foreach ($slides as $slide): ?>
                    <?php
                    $slide_title = rwmb_meta('title_text', array(), $slide->ID);
                    $slide_subtitle = rwmb_meta('subtitle_text', array(), $slide->ID);
                    $slide_button_text = rwmb_meta('button_text', array(), $slide->ID);
                    $slide_button_url= rwmb_meta('button_url', array(), $slide->ID);
                    $slide_thumbnail_image = get_the_post_thumbnail_url($slide->ID);
                    ?>
                    <li style="background: <?php echo zion_get_header_image_background($slide_thumbnail_image); ?> no-repeat;background-size: cover;background-position: center center;">
                        <div class="color-overlay"></div>
                        <div class="intro-wrapper">
                            <div class="intro">
                                <h1>
                                    <?php if(isset($slide_title) && $slide_title != ''): ?>
                                        <?php echo $slide_title; ?>
                                    <?php else: ?>
                                        <?php echo get_the_title($slide->ID); ?>
                                    <?php endif; ?>
                                </h1>
                                <?php if(isset($slide_subtitle) && $slide_subtitle != ''): ?>
                                    <p><?php echo $slide_subtitle; ?></p>
                                <?php endif; ?>
                                <?php if(isset($slide_button_text) && $slide_button_text != ''): ?>
                                    <a href="<?php echo ((isset($slide_button_url) && $slide_button_url != '') ? $slide_button_url : '#') ?>" class="btn btn-default-o onPageNav"><?php echo $slide_button_text; ?></a>
                                <?php endif; ?>
                            </div><!-- /.intro -->
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else : ?>
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
                </div>
            </div>
        </div>
    <?php
    endif;
    return ob_get_clean();
}
add_shortcode('zion_slider', 'zion_slider_shortcode');

?>