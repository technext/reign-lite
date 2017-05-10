<?php

include_once get_template_directory().'/inc/plugins/meta-box-tabs/meta-box-tabs.php';
include_once get_template_directory().'/inc/customizer-setup.php';
include_once get_template_directory().'/inc/widget-area.php';
include_once get_template_directory().'/inc/generate-dynamic-css.php';
include_once get_template_directory().'/inc/custom_css.php';
include_once get_template_directory().'/inc/templates/ReignNavWalker.php';
include_once get_template_directory().'/inc/templates/ReignCommentWalker.php';
include_once get_template_directory().'/inc/utils.php';
include_once get_template_directory().'/inc/extras.php';
include_once get_template_directory().'/inc/page_meta_box_setup.php';
include_once get_template_directory().'/inc/widgets/widgets_setup.php';

require_once get_template_directory().'/inc/reign_light_plugin_installer/class-tgm-plugin-activation.php';

if(! function_exists('reignwp_setup')){
    function reignwp_setup(){
        // Load Text Domains
        load_theme_textdomain('reign-lite', get_temp_dir().'/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        if(! isset($content_width)){
            $content_width = 960;
        }

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 825, 510, true );

        // This theme uses wp_nav_menu() in one locations.
        register_nav_menus( array(
            'primary' => __( 'Primary Nav Menu', 'reign-lite' )
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio'
        ) );

        /*
         * Enable support for custom logo.
         *
         * @since Reign 1.0
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 248,
            'width'       => 248,
            'flex-height' => true,
        ) );

        /*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
        add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );

        // Indicate widget sidebars can use selective refresh in the Customizer.
        add_theme_support( 'customize-selective-refresh-widgets' );

    }
    add_action('after_theme_setup', 'reignwp_setup');
}

/**
 * Add post type support
 */

function reign_add_post_type_support(){
    // add post support
    add_post_type_support('post', 'excerpt', 'post-thumbnails');
    add_theme_support('post-thumbnails');
}
add_action('init', 'reign_add_post_type_support');

/**
 * Add Theme Menu location support
 */

function reign_register_primary_menu(){
    // This theme uses wp_nav_menu() in one locations.
    register_nav_menus( array(
        'primary' => __( 'Primary Nav Menu', 'reign-lite' )
    ) );
}
add_action('init', 'reign_register_primary_menu');

/**
 * Enqueue Scripts Section
 */

if(!function_exists('reign_wp_enqueue_scripts')){
    function reign_wp_enqueue_scripts(){
        // stylesheets
        wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/lib/bootstrap/dist/css/bootstrap.min.css');
        wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/assets/lib/bootstrap/dist/css/bootstrap-theme.min.css');
        wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/lib/fontawesome/css/font-awesome.min.css');
        wp_enqueue_style('ionicons', get_template_directory_uri().'/assets/lib/ionicons/css/ionicons.css');
        wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/lib/owlcarousel/owl-carousel/owl.carousel.css');
        wp_enqueue_style('owl-carousel-theme', get_template_directory_uri().'/assets/lib/owlcarousel/owl-carousel/owl.theme.css');
        wp_enqueue_style('flex-slider', get_template_directory_uri().'/assets/lib/FlexSlider/flexslider.css');
        wp_enqueue_style('magnific-popup', get_template_directory_uri().'/assets/lib/magnific-popup/dist/magnific-popup.css');

        wp_enqueue_style('Raleway', 'http://fonts.googleapis.com/css?family=Raleway:100,300,400');
        wp_enqueue_style('Roboto', 'http://fonts.googleapis.com/css?family=Roboto:100,300,400');

        wp_enqueue_style('style', get_stylesheet_uri());
        wp_enqueue_style('style-ie-fix', get_template_directory_uri().'/assets/css/ie_fix.css');

        // scripts
        wp_enqueue_script('modernizr', get_template_directory_uri().'/assets/lib/components-modernizr/modernizr.js');
        wp_enqueue_script('jquery', get_template_directory_uri().'/assets/lib/jquery/dist/jquery.js');
        wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/lib/bootstrap/dist/js/bootstrap.min.js');
        wp_enqueue_script('imagesloaded', get_template_directory_uri().'/assets/lib/imagesloaded/imagesloaded.pkgd.min.js', array(), false, true);
        wp_enqueue_script('isotope', get_template_directory_uri().'/assets/lib/isotope/dist/isotope.pkgd.min.js', array(), false, true);
        wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/lib/owlcarousel/owl-carousel/owl.carousel.js', array(), false, true);
        wp_enqueue_script('waypoints-reign', get_template_directory_uri().'/assets/lib/waypoints/lib/jquery.waypoints.js', array(), false, true);
        wp_enqueue_script('waypoints-shortcuts', get_template_directory_uri().'/assets/lib/waypoints/lib/shortcuts/inview.js', array(), false, true);

        wp_enqueue_script('flex-slider', get_template_directory_uri().'/assets/lib/FlexSlider/jquery.flexslider.js', array(), false, true);
        wp_enqueue_script('text-rotator', get_template_directory_uri().'/assets/lib/simple-text-rotator/jquery.simple-text-rotator.js', array(), false, true);
        wp_enqueue_script('ytpplayer', get_template_directory_uri().'/assets/lib/jquery.mb.YTPlayer/dist/jquery.mb.YTPlayer.min.js', array(), false, true);
        wp_enqueue_script('magnific-popup', get_template_directory_uri().'/assets/lib/magnific-popup/dist/jquery.magnific-popup.js', array(), false, true);
        wp_enqueue_script('main_js', get_template_directory_uri().'/assets/js/main.js', array('jquery'), false, true);
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action('wp_enqueue_scripts', 'reign_wp_enqueue_scripts');
}

if ( ! function_exists( 'reign_fonts_url' ) ){
    /**
     * Register Google fonts for Reign.
     *
     * @since Re!gn 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function reign_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Sans, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'reign-lite' ) ) {
            $fonts[] = 'Noto Sans:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Serif, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'reign-lite' ) ) {
            $fonts[] = 'Noto Serif:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Inconsolata, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'reign-lite' ) ) {
            $fonts[] = 'Inconsolata:400,700';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'reign-lite' );

        if ( 'cyrillic' == $subset ) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ( 'greek' == $subset ) {
            $subsets .= ',greek,greek-ext';
        } elseif ( 'devanagari' == $subset ) {
            $subsets .= ',devanagari';
        } elseif ( 'vietnamese' == $subset ) {
            $subsets .= ',vietnamese';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
}

if(!function_exists('reign_body_classes')){
    function reign_body_classes($classes){
        if(is_blog()){
            $classes[] = get_option('reign_blog_layout', 'blog-standard');
        }

        if(isset($_GET['layout']) && $_GET['layout'] != ''){
            $classes[] = $_GET['layout'];
        }

        return $classes;
    }

    add_filter('body_class', 'reign_body_classes');
}

if(!function_exists('reign_admin_notice')){
    function reign_admin_notice(){
        ob_start();
        ?>
        <div class="notice reign-admin-notice is-dismissible">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/raignmain-logo.png' ?>"
                         alt="R E ! G N Light">
                </div>
                <div class="col-md-4 text-center">
                    <h2>2 out of 3 of Reign Lite users are</h2>
                    <h2>Upgrading to Reign Pro.</h2>
                    <h4><a target="_blank" href="https://wpwagon.com/themes/premium-corporate-agency-wordpress-theme-reign-pro?utm_src=reign_lite_dashboard&utm_medium=reign_lite_dashboard">Find out why?</a></h4>
                </div>
                <div class="col-md-4">
                    <p>
                        <a href="http://demo.wpwagon.com/preview/premium-corporate-agency-wordpress-theme-reign-pro"
                           class="button" target="_blank">Live Preview   &xrarr;</a>
                    </p>
                    <p>
                        <a href="https://wpwagon.com/themes/premium-corporate-agency-wordpress-theme-reign-pro?utm_src=reign_lite_dashboard&utm_medium=reign_lite_dashboard"
                           class="button" target="_blank">Buy Pro   &xrarr;</a>
                    </p>
                </div>
                <div class="clear-fix"></div>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
    add_action('admin_notices', 'reign_admin_notice');
}

function footer_right_text_override(){
    return '<p class="text-md-right text-sm-center text-xs-center">Theme By <a href="https://wpwagon.com">WPWagon</a></p>';
}

add_filter('theme_mod_reign_right_column_text', 'footer_right_text_override');

if(!function_exists('reign_register_required_plugins')){
    function reign_register_required_plugins(){
        /*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
        $plugins = array(

            // Meta box Plugin
            array(
                'name'               => 'Meta Box', // The plugin name.
                'slug'               => 'meta-box', // The plugin slug (typically the folder name).
                'source'             => 'https://wordpress.org/plugins/meta-box/', // The plugin source.
                'required'           => true, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url'       => '', // If set, overrides default API URL and points to an external URL.
                'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
            ),
            // Disqus Comment System Plugin
            array(
                'name'               => 'Disqus Comment System',
                'slug'               => 'disqus-comment-system',
                'source'             => 'https://wordpress.org/plugins/disqus-comment-system/',
                'required'           => true,
                'version'            => '',
                'force_activation'   => true,
                'force_deactivation' => false,
                'external_url'       => '',
                'is_callable'       => ''
            ),
            // Instagram feed
            array(
                'name'               => 'Instagram Feed',
                'slug'               => 'instagram-feed',
                'source'             => 'https://wordpress.org/plugins/instagram-feed/',
                'required'           => true,
                'version'            => '',
                'force_activation'   => true,
                'force_deactivation' => false,
                'external_url'       => '',
                'is_callable'       => ''
            ),
            // Contact Form 7 https://wordpress.org/plugins/contact-form-7/
            array(
                'name'               => 'Contact Form 7',
                'slug'               => 'contact-form-7',
                'source'             => 'https://wordpress.org/plugins/contact-form-7/',
                'required'           => true,
                'version'            => '',
                'force_activation'   => true,
                'force_deactivation' => false,
                'external_url'       => '',
                'is_callable'       => ''
            )
        );

        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         */
        $config = array(
            'id'           => 'reign-required-plugins',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'reign-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );

        tgmpa( $plugins, $config );
    }
    add_action('tgmpa_register', 'reign_register_required_plugins');
}

function reign_wp_title($title, $separator){
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title = get_bloginfo('title') . $title;

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $separator $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $separator " . sprintf( __( 'Page %s', 'reign-lite' ), max( $paged, $page ) );

    return $title;
}
add_filter('wp_title', 'reign_wp_title', 10, 2);

function reign_enqueue_admin_scripts(){
    wp_enqueue_style('ionicons', get_template_directory_uri().'/assets/lib/ionicons/css/ionicons.css');
    wp_enqueue_style('font-icon-picker', get_template_directory_uri().'/assets/lib/font-icon-picker/css/jquery.fonticonpicker.min.css');
    wp_enqueue_style('font-icon-picker-grey', get_template_directory_uri().'/assets/lib/font-icon-picker/themes/grey-theme/jquery.fonticonpicker.grey.min.css');
    wp_enqueue_style('font-icon-picker-dark-grey', get_template_directory_uri().'/assets/lib/font-icon-picker/themes/dark-grey-theme/jquery.fonticonpicker.darkgrey.min.css');
    wp_enqueue_style('font-icon-picker-bootstrap', get_template_directory_uri().'/assets/lib/font-icon-picker/themes/bootstrap-theme/jquery.fonticonpicker.bootstrap.min.css');
    wp_enqueue_style('font-icon-picker-inverted', get_template_directory_uri().'/assets/lib/font-icon-picker/themes/inverted-theme/jquery.fonticonpicker.inverted.min.css');
    wp_enqueue_style('reign-admin-css', get_template_directory_uri().'/assets/css/reign.admin.css');
    wp_enqueue_media();
    wp_enqueue_script('font-icon-picker', get_template_directory_uri().'/assets/lib/font-icon-picker/jquery.fonticonpicker.min.js', array('jquery'));
    wp_enqueue_script('reign-admin-js', get_template_directory_uri().'/assets/js/reign.admin.js', array('jquery'), false, true);
}
add_action('admin_enqueue_scripts', 'reign_enqueue_admin_scripts');

?>