<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 6/21/16
 * Time: 6:36 PM
 */

include_once get_template_directory().'/inc/widgets/search.php';
include_once get_template_directory().'/inc/widgets/recent_posts.php';
include_once get_template_directory().'/inc/widgets/posts_widget.php';
include_once get_template_directory().'/inc/widgets/section_title_widget.php';
include_once get_template_directory().'/inc/widgets/about_us_widget.php';
include_once get_template_directory().'/inc/widgets/contact_form_widget.php';
include_once get_template_directory().'/inc/widgets/call_to_action_widget.php';
include_once get_template_directory().'/inc/widgets/team_widget.php';
include_once get_template_directory().'/inc/widgets/funfacts_widget.php';
include_once get_template_directory().'/inc/widgets/content_box_widget.php';

function reign_widget_unregister(){
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Recent_Posts');
}
add_action('widgets_init', 'reign_widget_unregister');

function reign_widget_register(){
    register_widget('Reign_Widget_Search');
    register_widget('Reign_Widget_Recent_Post');

    // page widgets
    register_widget('ReignPostsWidget');
    register_widget('ReignSectionTitleWidget');
    register_widget('AboutUsWidget');
    register_widget('ContactFormWidget');
    register_widget('CallToActionWidget');
    register_widget('ReignTeamWidget');
    register_widget('ReignFunFactsWidget');
    register_widget('ReignContentBoxWidget');
}
add_action('widgets_init', 'reign_widget_register');

?>