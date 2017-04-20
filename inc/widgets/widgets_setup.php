<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 6/21/16
 * Time: 6:36 PM
 */

include_once get_template_directory().'/inc/widgets/search.php';
include_once get_template_directory().'/inc/widgets/recent_posts.php';

function reign_widget_unregister(){
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Recent_Posts');
}
add_action('widgets_init', 'reign_widget_unregister');

function reign_widget_register(){
    register_widget('Reign_Widget_Search');
    register_widget('Reign_Widget_Recent_Post');
}
add_action('widgets_init', 'reign_widget_register');

?>