<?php
/**
 * Utility Functions for Reign WP
 */

function reign_get_column_layout($number_of_column){
    if($number_of_column == 1){
        return 'col-md-12';
    }
    else if($number_of_column == 2){
        return 'col-md-6 col-sm-12 col-xs-12';
    }
    else if($number_of_column == 3){
        return 'col-md-4 col-sm-6';
    }
    else if($number_of_column == 4){
        return 'col-md-3 col-sm-6';
    }
    else if($number_of_column == 5){
        return 'col-md-5th col-sm-6';
    }
    else {
        return 'col-md-4 col-sm-6';
    }
}

function reign_get_excerpt($post, $count, $show_read_more = true){
    $permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    if($show_read_more) $excerpt = $excerpt.'... <a href="'.$permalink.'">Read More</a>';
    else $excerpt = $excerpt . '...';
    return $excerpt;
}

function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

function reign_get_blog_layout(){
    $layout = get_option('reign_blog_layout', 'blog-standard');
    if(isset($_GET['layout']) && $_GET['layout'] != ''){
        $layout = $_GET['layout'];
    }
    return $layout;
}

function reign_get_blog_column(){
    $column = get_option('reign_blog_grid_columns', '2');
    return $column;
}

function reign_get_blog_sidebar_position(){
    $position = get_option('reign_blog_sidebar_position', 'right-sidebar');
    if(isset($_GET['sidebar']) && $_GET['sidebar'] != ''){
        $position = $_GET['sidebar'];
    }
    return $position;
}

function reign_get_blog_archive_header($layout = 'blog-standard', $has_sidebar = false){
    if(isset($_GET['sidebar']) && $_GET['sidebar'] == 'false'){
        $has_sidebar = false;
    }
    if($layout == 'blog-standard'){
        if($has_sidebar == false) {
            return '<div class="col-md-8 col-md-offset-2">';
        }
        else {
            return '<div class="col-md-8">';
        }
    }
    else {
        if($has_sidebar == false){
            return '<div id="blogContent" class="section-content">
                        <div class="row">';
        }
        else{
                return '<!--blog content-->
                            <div class="col-md-8">
                                <div id="blogContent" class="section-content">
                                    <div class="row">';
        }
    }

}

function reign_get_thumbnail_url($post_id = 0){
    if($post_id != 0){
        return get_the_post_thumbnail_url($post_id);
    }
    $page_id = 0;
    if(is_post_type_archive('zion_portfolio')){
        return get_theme_mod('reign_portfolio_header_image');
    }
    else if(is_blog()){
        $page_id = get_option('page_for_posts');
    }
    else {
        global $wp_query;
        if(isset($wp_query->post)){
            $page_id = $wp_query->post->id;
        }
        else{
            $page_id = get_option('page_for_posts');
        }

    }
    $featured_image_url = get_the_post_thumbnail_url($page_id);
    return $featured_image_url;
}

function reign_get_the_title(){
    if(is_search()){
        return __('Search Results For '. get_search_query(true), 'stoic');
    }
    if(is_tag()){
        return single_tag_title("Tag: ", false);
    }
    if(is_category()){
        return single_cat_title("Category: ", false);
    }
    if(is_blog()){
        if(!is_single()){
            if('page' == get_option('show_on_front')){
                $blog_page_id = get_option('page_for_posts');
                if(isset($blog_page_id)){
                    return esc_attr(get_the_title($blog_page_id));
                }
                else{
                    return esc_attr(get_the_title());
                }
            }
            else{
                return esc_attr(get_bloginfo('title'));
            }
        }
        else {
            return esc_attr(get_the_title());
        }
    }
    return esc_attr(get_the_title());
}

function reign_wp_primary_nav_menu(){
    wp_nav_menu( array(
        'theme_location'                      => 'primary',
        'walker'                        => new ReignNavWalker(),
        'menu_class'                    => 'nav navbar-nav navbar-right',
        'menu_id'                       => '',
        'container'                     => 'ul',
        'container_class'               => '',
        'container_id'                  => ''
    ) );
}
function reign_wp_posts_pagination(){

    global $wp_query;
    global $paged;
    if(empty($paged)) $paged = 1;
    $pages = $wp_query->max_num_pages;
    if(!$pages)
    {
        $pages = 1;
    }

    if(1 != $pages)
    {
        echo "<nav>\n";
        echo "<ul class=\"pagination pagination-lg\">\n";
        if($paged > 1 && $paged <= $pages) echo '<li><a href="'.get_previous_posts_page_link().'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';

        for ($i=1; $i <= $pages; $i++)
        {
            echo ($paged == $i) ? '<li class="active"><a>'.$i.'</a></li>' : '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
        }

        if ($paged < $pages && $paged >= 1) echo '<li><a href="'.get_next_posts_page_link().'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        echo "</ul>\n";
        echo "</nav>\n";
    }
}

if ( ! function_exists( 'reign_comment_nav' ) ) :
    function reign_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'reign-light' ); ?></h2>
                <div class="nav-links">
                    <?php
                    if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'reign-light' ) ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'reign-light' ) ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->
            <?php
        endif;
    }
endif;

// ======================== Header Section ========================================== //

/**
 * gets the header type
 * @return mixed|string
 */
function reign_get_header_type(){
    if(function_exists('rwmb_meta')){
        $header_type = rwmb_meta('reign_header_type');
    }
    if( !isset($header_type) ) return 'featured_image';
    return $header_type;
}

/**
 * returns the header image background
 * @return string
 */
function reign_get_header_image_background(){
    // featured image properties
    $featured_image_url = reign_get_thumbnail_url();
    $page_header_background = '#cccccc';
    if($featured_image_url != ''){
        $page_header_background = "url('".$featured_image_url."')";
    }
    return $page_header_background;
}

/**
 * returns if header is full screen or not
 * @return int|mixed
 */
function reign_is_header_full_screen(){
    if(function_exists('rwmb_meta')){
        $is_header_full_screen = rwmb_meta('reign_is_page_header_fullscreen');
    }
    if( !isset( $is_header_full_screen ) ) return 0;
    return $is_header_full_screen;
}

/**
 * returns if header should show breadcrumb or not
 * @return int|mixed
 */
function reign_show_header_breadcrumb(){
    if(function_exists('rwmb_meta')){
        $show_header_breadcrumb = rwmb_meta('reign_page_show_breadcrumb');
    }
    if( !isset( $show_header_breadcrumb ) ) return 0;
    return $show_header_breadcrumb;
}

function reign_page_header_slider_shortcode($page_header_slder_id){
    if(!isset($page_header_slder_id)) return '';
    $shortcode = '[zion_slider id="'.$page_header_slder_id->term_id.'"]';
    return $shortcode;
}

// ---------------------------------------------------------------------------------- //


// ======================== Footer Social Link Section ============================== //

/**
 * checks if there is any social links available
 * @return bool
 */

function reign_has_any_footer_social_links(){
    $fb = get_theme_mod('reign_footer_facebook_url');
    $twitter = get_theme_mod('reign_footer_twitter_url');
    $behance = get_theme_mod('reign_footer_behance_url');
    $pinterest = get_theme_mod('reign_footer_pinterest_url');
    $google_plus = get_theme_mod('reign_footer_google_plus_url');
    $linkedin = get_theme_mod('reign_footer_linekdin_url');

    if( isset($fb) || isset($twitter) || isset($behance) || isset($pinterest) || isset($google_plus) || isset($linkedin) ){
        return true;
    }
    return false;
}

/**
 * gets the footer facebook url
 * @return string
 */

function reign_get_footer_facebook_url(){
    $fb = get_theme_mod('reign_footer_facebook_url');
    if(!isset($fb)) return '';
    else return $fb;
}

/**
 * gets the footer twitter url
 * @return string
 */

function reign_get_footer_twitter_url(){
    $twitter = get_theme_mod('reign_footer_twitter_url');
    if(!isset($twitter)) return '';
    else return $twitter;
}

/**
 * gets the footer behance url
 * @return string
 */

function reign_get_footer_behance_url(){
    $behance = get_theme_mod('reign_footer_behance_url');
    if(!isset($behance)) return '';
    else return $behance;
}

/**
 * gets the footer pinterest url
 * @return string
 */

function reign_get_footer_pinterest_url(){
    $pinterest = get_theme_mod('reign_footer_pinterest_url');
    if(!isset($pinterest)) return '';
    else return $pinterest;
}

/**
 * gets the footer google plus url
 * @return string
 */

function reign_get_footer_google_plus_url(){
    $google_plus = get_theme_mod('reign_footer_google_plus_url');
    if(!isset($google_plus)) return '';
    else return $google_plus;
}

/**
 * gets the footer linkedin url
 * @return string
 */

function reign_get_footer_linkedin_url(){
    $linkedin = get_theme_mod('reign_footer_linkedin_url');
    if(!isset($linkedin)) return '';
    else return $linkedin;
}

// ----------------------------------------------------------------------------------- //

// ======================== Footer Widget Area Section =============================== //

function reign_is_footer_widget_area_active(){
    $number_of_column = get_option('reign_number_of_footer_widget_column');
    if(!isset($number_of_column) || $number_of_column <= 0){
        return false;
    }
    $nfw = intval($number_of_column);
    for($i = 1; $i <= $nfw; $i++){
        if(is_active_sidebar('footer-widget-'.$i)){
            return true;
        }
    }
    return false;
}

// ----------------------------------------------------------------------------------- //

?>