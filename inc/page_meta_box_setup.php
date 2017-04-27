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
    $prefix = 'reign_';
    $meta_boxes[] = array(
        'id'            => $prefix.'page_meta_box',
        'title'         => __('Header Settings', 'reign-light'),
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
                    'video_background'      => __('Video Background', 'reign-light')
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
            )
        )
    );
    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'reign_setup_page_meta_boxes');