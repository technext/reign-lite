<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 6/18/16
 * Time: 4:10 PM
 */

function reign_setup_page_meta_boxes($meta_boxes){
    $sliders = get_terms(array(
        'taxonomy'          => 'zion_slider',
        'hide_empty'        => true
    ));
    $slider_opt = array();
    foreach ($sliders as $slider){
        if(isset($slider->term_id)) {
            $slider_opt[$slider->term_id] = $slider->name;
        }
    }
//    print_r($sliders);die();
    $prefix = 'reign_';
    $meta_boxes[] = array(
        'id'            => $prefix.'page_meta_box',
        'title'         => __('Page Settings', 'reign-light'),
        'post_types'    => array('page'),
        'context'       => 'normal',
        'priority'      => 'high',
        'tabs'          => array(
            'header'            => array(
                'label'                => __('Header', 'reign-light'),
                'icon'                 => 'fa fa-header'
            ),
            'video'             => array(
                'label'                => __('Video Background', 'reign-light'),
                'icon'                 => 'fa fa-play'
            ),
            'text_rotator'      => array(
                'label'                => __('Text Rotator', 'reign-light'),
                'icon'                 => 'fa fa-undo'
            ),
            'slider'            => array(
                'label'                => __('Slider', 'reign-light'),
                'icon'                 => 'fa fa-picture-o'
            )
        ),
        'tab_style'     => 'left',
        'fields'        => array(
            array(
                'name'          => __('Header Type', 'reign-light'),
                'type'          => 'select',
                'id'            => $prefix.'header_type',
                'desc'          => '',
                'options'       => array(
                    'featured_image'        => __('Featured Image', 'reign-light'),
                    'gradient_overlay'      => __('Featured Image (With Gradient)', 'reign-light'),
                    'video_background'      => __('Video Background', 'reign-light'),
                    'text_rotator'          => __('Text Rotator', 'reign-light'),
                    'slider'                => __('Slider', 'reign-light')
                ),
                'tab'           => 'header'
            ),
            array(
                'name'          => __('Custom Page Title', 'reign-light'),
                'type'          => 'text',
                'id'            => $prefix.'page_custom_title',
                'desc'          => __('This won\'t work for Text Rotator header type', 'reign-light'),
                'tab'           => 'header'
            ),
            array(
                'name'          => __('Custom Page Subtitle', 'reign-light'),
                'type'          => 'text',
                'id'            => $prefix.'page_custom_subtitle',
                'desc'          => '',
                'tab'           => 'header'
            ),
            array(
                'name'          => __('Header Button Text', 'reign-light'),
                'type'          => 'text',
                'id'            => $prefix.'page_header_button_text',
                'desc'          => '',
                'tab'           => 'header'
            ),
            array(
                'name'          => __('Header Button Link', 'reign-light'),
                'type'          => 'text',
                'id'            => $prefix.'page_header_button_link',
                'desc'          => '',
                'tab'           => 'header'
            ),
//            array(
//                'name'          => __('Show Breadcrumb', 'reign-light'),
//                'type'          => 'checkbox',
//                'id'            => $prefix.'page_show_breadcrumb',
//                'desc'          => '',
//                'tab'           => 'header'
//            ),
            array(
                'name'          => __('Full Screen Header', 'reign-light'),
                'type'          => 'checkbox',
                'id'            => $prefix.'is_page_header_fullscreen',
                'desc'          => '',
                'tab'           => 'header'
            ),
            array(
                'name'          => __('Youtube Video Url', 'reign-light'),
                'type'          => 'text',
                'id'            => $prefix.'page_header_youtube_video_url',
                'desc'          => '',
                'tab'           => 'video'
            ),
            array(
                'name'          => __('Mute Video', 'reign-light'),
                'type'          => 'checkbox',
                'id'            => $prefix.'page_header_mute_video',
                'desc'          => '',
                'tab'           => 'video'
            ),
            array(
                'name'          => __('Autoplay Video', 'reign-light'),
                'type'          => 'checkbox',
                'id'            => $prefix.'page_header_video_autoplay',
                'desc'          => '',
                'tab'           => 'video'
            ),
            array(
                'name'          => __('Loop Video', 'reign-light'),
                'type'          => 'checkbox',
                'id'            => $prefix.'page_header_loop_video',
                'desc'          => '',
                'tab'           => 'video'
            ),
            array(
                'name'          => __('Start At', 'reign-light'),
                'type'          => 'number',
                'id'            => $prefix.'page_header_video_start',
                'desc'          => '',
                'tab'           => 'video'
            ),
            array(
                'name'          => __('End At', 'reign-light'),
                'type'          => 'number',
                'id'            => $prefix.'page_header_video_end',
                'desc'          => '',
                'tab'           => 'video'
            ),
            array(
                'name'          => __('Title text before rotator', 'reign-light'),
                'type'          => 'text',
                'id'            => $prefix.'rotator_text_before',
                'desc'          => __('This text will be added before rotator text in the title', 'reign-light'),
                'tab'           => 'text_rotator'
            ),
            array(
                'name'          => __('Title text after rotator', 'reign-light'),
                'type'          => 'text',
                'id'            => $prefix.'rotator_text_after',
                'desc'          => __('This text will be added after rotator text in the title', 'reign-light'),
                'tab'           => 'text_rotator'
            ),
            array(
                'name'          => __('Rotator Text', 'reign-light'),
                'type'          => 'text',
                'id'            => $prefix.'rotator_text',
                'desc'          => __('Put your words you want to rotate here, comma separated'),
                'tab'           => 'text_rotator'
            ),
            array(
                'name'          => __('Sliders', 'reign-light'),
                'type'          => 'taxonomy',
                'taxonomy'          => 'zion_slider',
                'field_type'    => 'select',
                'id'            => $prefix.'header_slider',
                'desc'          => __('Choose a slider from Z!ON Slider'),
                'placeholder'   => 'Select a Slider',
                'query_args'    => array(
                    'taxonomy'      => 'zion_slider',
                    'hide_empty'    => true
                ),
                'tab'           => 'slider'
            )
        )
    );
    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'reign_setup_page_meta_boxes');