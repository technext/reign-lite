<?php

if(!function_exists('reign_customize_register')){
    /***
     * Registers Customizer Settings for Reign.
     * @param $wp_customize
     */
    function reign_customize_register( $wp_customize ){
        // general settings section
        general_settings_section($wp_customize);

        // blog setting options setup
        blog_settings_section($wp_customize);

        // portfolio setting options setup
        portfolio_settings_section($wp_customize);

        // header settings options setup
        logo_section($wp_customize);

        // footer widget options setup
        footer_widget_section($wp_customize);
    }
    add_action('customize_register', 'reign_customize_register');
}

function general_settings_section($wp_customize){
    $wp_customize->add_section('reign_general_section', array(
        'title'             => __('General', 'reign-light'),
        'description'       => '',
        'priority'          => 90
    ));

    // ======================
    // = Custom CSS Section =
    // ======================

    $wp_customize->add_setting('reign_custom_css', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option'
    ));

    $wp_customize->add_control('reign_custom_css', array(
        'settings'      => 'reign_custom_css',
        'label'         => __('Custom CSS', 'reign-light'),
        'section'       => 'reign_general_section',
        'type'          => 'textarea'
    ));
}

/**
 * Blog Archive Page Settings
 * @param $wp_customize
 */

function blog_settings_section($wp_customize){
    $wp_customize->add_section('blog_settings_section', array(
        'title'             => __('Blog', 'reign-light'),
        'description'       => '',
        'priority'          => 90,
    ));

    //  =================
    //  =  Blog Layout  =
    //  =================

    $wp_customize->add_setting('reign_blog_layout', array(
        'default'        => 'Standard',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'reign_blog_layout', array(
        'settings'      => 'reign_blog_layout',
        'label'         => 'Blog Layout',
        'section'       => 'blog_settings_section',
        'type'          => 'select',
        'choices'       => array(
            'blog-standard'         => 'Standard',
            'blog-grid-2-col'       => 'Grid 2 Column',
            'blog-grid-3-col'       => 'Grid 3 Column'
        ),
    ));

    //  ======================
    //  =  Sidebar Position  =
    //  ======================

    $wp_customize->add_setting('reign_blog_sidebar_position', array(
        'default'        => 'right-sidebar',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'reign_blog_sidebar_position', array(
        'settings' => 'reign_blog_sidebar_position',
        'label'   => 'Blog Sidebar Position',
        'section' => 'blog_settings_section',
        'type'    => 'select',
        'choices'    => array(
            'left-sidebar' => 'Left',
            'right-sidebar' => 'Right'
        ),
    ));

    // ======================
    // = Sticky Header Text =
    // ======================

    $wp_customize->add_setting('reign_blog_sticky_header_text', array(
        'default'       => 'Sticky',
        'capability'    => 'edit_theme_options',
        'type'          => 'option'
    ));

    $wp_customize->add_control('reign_blog_sticky_header_text', array(
        'settings'      => 'reign_blog_sticky_header_text',
        'label'         => 'Blog Sticky Post Sticker Text',
        'section'       => 'blog_settings_section',
        'type'          => 'text'
    ));
}

/**
 * Portfolio Settings Section
 * @param $wp_customize
 */

function portfolio_settings_section($wp_customize){
    $wp_customize->add_section('reign_portfolio_section', array(
        'title'                     => __('Portfolio Settings', 'reign-light'),
        'description'               => '',
        'priority'                  => 90
    ));

    //  ======================
    //  =  Portfolio Layout  =
    //  ======================

    $wp_customize->add_setting('reign_portfolio_layout', array(
        'default'        => 'portfolio-lightbox',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'reign_portfolio_layout', array(
        'settings'                  => 'reign_portfolio_layout',
        'label'                     => 'Portfolio Layout',
        'section'                   => 'reign_portfolio_section',
        'type'                      => 'select',
        'choices'                   => array(
            'portfolio-lightbox'            => 'Portfolio Lightbox',
            'portfolio-boxed-2-column'      => 'Boxed 2 Column',
            'portfolio-boxed-3-column'      => 'Boxed 3 Column',
            'portfolio-wide-2-column'       => 'Wide 2 Column',
            'portfolio-wide-3-column'       => 'Wide 3 Column',
            'portfolio-wide-4-column'       => 'Wide 4 Column'
        ),
    ));

    // ==================================
    // = Portfolio Header Image Section =
    // ==================================

    $wp_customize->add_setting('reign_portfolio_header_image');

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'reign_portfolio_header_image',
        array(
            'label'      => __( 'Portfolio Archive Page Header', 'reign-light' ),
            'section'    => 'reign_portfolio_section',
            'settings'   => 'reign_portfolio_header_image'
        )
    ));
}

/**
 * Header Section Setup
 * @param $wp_customize
 */

function logo_section($wp_customize){
    // ================
    // = Logo Section =
    // ================

    $wp_customize->add_setting('reign_logo_url');

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'reign_logo_url',
        array(
            'label'      => __( 'Upload a logo', 'reign-light' ),
            'section'    => 'title_tagline',
            'settings'   => 'reign_logo_url'
        )
    ));
}

/**
 * Footer Widgets Options Setup
 * @param $wp_customize
 */

function footer_widget_section($wp_customize){

    $wp_customize->add_section('footer_widgets', array(
        'title'         => __('Footer Settings', 'reign-light'),
        'description'   => '',
        'priority'      => 90
    ));

    //  =========================================
    //  =  Number of column in footer widget    =
    //  =========================================
    $wp_customize->add_setting('reign_number_of_footer_widget_column', array(
        'default'        => '4',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'reign_number_of_footer_widget_column', array(
        'settings' => 'reign_number_of_footer_widget_column',
        'label'   => 'Number Of Footer Widget Area:',
        'section' => 'footer_widgets',
        'type'    => 'select',
        'choices'    => array(
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5,
        ),
    ));

    // =========================================
    // = Footer Widget Area Background Color   =
    // =========================================

    $wp_customize->add_setting('reign_footer_widget_area_background_color', array(
        'default'       => '#171717',
        'capability'    => 'edit_theme_options',
        'type'          => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'reign_footer_widget_area_background_color',
        array(
            'label'     => __('Footer Widget Background Color', 'reign-light'),
            'settings'  => 'reign_footer_widget_area_background_color',
            'section'   => 'footer_widgets',
            'priority'  => 10
        )
    ) );

    // ====================================
    // = Footer Widget Area Title Color   =
    // ====================================

    $wp_customize->add_setting('reign_footer_widget_area_title_color', array(
        'default'       => '#ffffff',
        'capability'    => 'edit_theme_options',
        'type'          => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'reign_footer_widget_area_title_color',
        array(
            'label'     => __('Footer Widget Title Color', 'reign-light'),
            'settings'  => 'reign_footer_widget_area_title_color',
            'section'   => 'footer_widgets',
            'priority'  => 10
        )
    ) );

    // ===================================
    // = Footer Widget Area Text Color   =
    // ===================================

    $wp_customize->add_setting('reign_footer_widget_area_text_color', array(
        'default'       => '#ffffff',
        'capability'    => 'edit_theme_options',
        'type'          => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'reign_footer_widget_area_text_color',
        array(
            'label'     => __('Footer Widget Text Color', 'reign-light'),
            'settings'  => 'reign_footer_widget_area_text_color',
            'section'   => 'footer_widgets',
            'priority'  => 10
        )
    ) );


    // ===========================
    // = Footer left column text =
    // ===========================

    $wp_customize->add_setting('reign_left_column_text', array(
        'default'       => 'Copyright &copy; 2017. Theme by <a href="https://www.wpwagon.com">WPWagon</a>',
        'capability'    => 'edit_theme_options',
        'type'          => 'theme_mod'
    ));

    $wp_customize->add_control( 'reign_left_column_text', array(
        'type' => 'textarea',
        'priority' => 10, // Within the section.
        'section' => 'footer_widgets', // Required, core or custom.
        'label' => __( 'Left Column Text', 'reign-light' ),
        'description' => ''
    ) );


    // ======================
    // = Footer Social Menu =
    // ======================

    // Facebook

    $wp_customize->add_setting('reign_footer_facebook_url', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'type'          => 'theme_mod'
    ));

    $wp_customize->add_control( 'reign_footer_facebook_url', array(
        'type' => 'text',
        'priority' => 10, // Within the section.
        'section' => 'footer_widgets', // Required, core or custom.
        'label' => __( 'Facebook Url', 'reign-light' ),
        'description' => ''
    ) );

    // Twitter

    $wp_customize->add_setting('reign_footer_twitter_url', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'type'          => 'theme_mod'
    ));

    $wp_customize->add_control( 'reign_footer_twitter_url', array(
        'type' => 'text',
        'priority' => 10, // Within the section.
        'section' => 'footer_widgets', // Required, core or custom.
        'label' => __( 'Twitter Url', 'reign-light' ),
        'description' => ''
    ) );

    // Pinterest

    $wp_customize->add_setting('reign_footer_pinterest_url', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'type'          => 'theme_mod'
    ));

    $wp_customize->add_control( 'reign_footer_pinterest_url', array(
        'type' => 'text',
        'priority' => 10, // Within the section.
        'section' => 'footer_widgets', // Required, core or custom.
        'label' => __( 'Pinterest Url', 'reign-light' ),
        'description' => ''
    ) );

    // Behance

    $wp_customize->add_setting('reign_footer_behance_url', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'type'          => 'theme_mod'
    ));

    $wp_customize->add_control( 'reign_footer_behance_url', array(
        'type' => 'text',
        'priority' => 10, // Within the section.
        'section' => 'footer_widgets', // Required, core or custom.
        'label' => __( 'Behance Url', 'reign-light' ),
        'description' => ''
    ) );

    // Google Plus

    $wp_customize->add_setting('reign_footer_google_plus_url', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'type'          => 'theme_mod'
    ));

    $wp_customize->add_control( 'reign_footer_google_plus_url', array(
        'type' => 'text',
        'priority' => 10, // Within the section.
        'section' => 'footer_widgets', // Required, core or custom.
        'label' => __( 'Google Plus Url', 'reign-light' ),
        'description' => ''
    ) );

    // Linkedin

    $wp_customize->add_setting('reign_footer_linkedin_url', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'type'          => 'theme_mod'
    ));

    $wp_customize->add_control( 'reign_footer_linkedin_url', array(
        'type' => 'text',
        'priority' => 10, // Within the section.
        'section' => 'footer_widgets', // Required, core or custom.
        'label' => __( 'Linkedin Url', 'reign-light' ),
        'description' => ''
    ) );

    // ============================
    // = Footer right column text =
    // ============================

    $wp_customize->add_setting('reign_right_column_text', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'type'          => 'theme_mod'
    ));

    $wp_customize->add_control( 'reign_right_column_text', array(
        'type' => 'textarea',
        'priority' => 10, // Within the section.
        'section' => 'footer_widgets', // Required, core or custom.
        'label' => __( 'Right Column Text', 'reign-light' ),
        'description' => ''
    ) );

}
?>