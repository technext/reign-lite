<?php
/**
 * Register widget area.
 *
 * @since Reign 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function reign_widgets_init() {
    // page side bar setup
    blog_page_sidebar_setup();

    // footer widget area setup
    footer_widget_area_setup();

    // portfolio widget  area setup
//    portfolio_widget_area_setup();
}
add_action( 'widgets_init', 'reign_widgets_init' );

function blog_page_sidebar_setup(){
    register_sidebar(array(
        'name'      => __('Blog Sidebar', 'reign-light'),
        'id'        => 'blog-page-sidebar',
        'class'     => 'content-wrap',
        'before_widget' => '<div id="%1$s" class="%1$s %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ));
}

/**
 * Footer Widget Area Setup
 */

function footer_widget_area_setup(){
    $number_of_column = get_option('reign_number_of_footer_widget_column');
    $n_w = intval($number_of_column);
    for($i = 1; $i <= $n_w; $i++){
        register_sidebar(array(
            'name'  => __('Footer Widget '.$i, 'reign-light'),
            'id'    => 'footer-widget-'.$i,
            'class' => 'content-wrap',
            'before_widget' => '<div id="%1$s" class="%1$s %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>'
        ));
    }
}

function get_footer_column_class($number){
    return ( $number == 1 ? 'col-md-12 col-sm-12' : ( $number == 2 ? 'col-md-6 col-sm-12' : ( $number == 3 ? 'col-md-4 col-sm-6' : ( $number == 4 ? 'col-md-3 col-sm-6' : ( $number == 5 ? 'col-md-5th col-sm-6' : 'col-md-6 col-sm-12' ) ) ) ) );
}

/**
 * Portfolio Widget Area Setup
 */

function portfolio_widget_area_setup(){
    register_sidebar(array(
        'name'      => __('Portfolio Sidebar', 'reign-light'),
        'id'        => 'portfolio-sidebar',
        'class'     => 'content-wrap',
        'before_widget' => '<div id="%1$s" class="%1$s %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ));
}
?>