<?php

/**
 * check if Visual Composer is installed
 */
if(function_exists('vc_init')){
    /**
     * sets Visual Composer as theme.
     */
    function reign_vc_setup(){
        vc_set_as_theme();
    }
    add_action('vc_init', 'reign_vc_setup');
}

// Add Bootstrap support in VC
//if(!( function_exists('reign_adding_bootstrap_layout') )){
//    function reign_adding_bootstrap_layout( $class_string, $tag ) {
//        if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
//            $class_string = preg_replace( '/vc_col-sm-(\d{1,2})/', 'col-md-$1', $class_string );
//        }
//        return $class_string; // Important: you should always return modified or original $class_string
//    }
//    add_filter( 'vc_shortcodes_css_class', 'reign_adding_bootstrap_layout', 10, 2 );
//}

//get_template_part('inc/pagebuilder_elements/test_block');
get_template_part('inc/pagebuilder_elements/reign_title');
get_template_part('inc/pagebuilder_elements/reign_section_title');
get_template_part('inc/pagebuilder_elements/reign_button');
get_template_part('inc/pagebuilder_elements/reign_video_player');
get_template_part('inc/pagebuilder_elements/reign_call_to_action');
get_template_part('inc/pagebuilder_elements/reign_team');
get_template_part('inc/pagebuilder_elements/reign_contact_us');
get_template_part('inc/pagebuilder_elements/reign_testimonial');
get_template_part('inc/pagebuilder_elements/reign_blog_post');
get_template_part('inc/pagebuilder_elements/reign_process');
get_template_part('inc/pagebuilder_elements/reign_content_box');
get_template_part('inc/pagebuilder_elements/reign_funfacts');
get_template_part('inc/pagebuilder_elements/reign_pricing_table');
get_template_part('inc/pagebuilder_elements/reign_image_carousel');
get_template_part('inc/pagebuilder_elements/reign_skills');
get_template_part('inc/pagebuilder_elements/reign_progress_box');
get_template_part('inc/pagebuilder_elements/reign_accordion');
get_template_part('inc/pagebuilder_elements/reign_tabs');
get_template_part('inc/pagebuilder_elements/reign_faq');
get_template_part('inc/pagebuilder_elements/reign_gallery_section');
get_template_part('inc/pagebuilder_elements/reign_why_choose_us');
get_template_part('inc/pagebuilder_elements/reign_portfolio_section');
get_template_part('inc/pagebuilder_elements/reign_subscription_form');

?>