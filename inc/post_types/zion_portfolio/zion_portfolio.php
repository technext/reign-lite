<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 6/28/16
 * Time: 3:22 PM
 */

function zion_portfolio_post_type(){
    register_post_type('zion_portfolio', array(
        'labels'                    => array(
            'name'                          => 'Z!ON Portfolio',
            'singular_name'                 => 'Z!ON Portfolio',
            'add_new'                       => 'Add New',
            'add_new_item'                  => 'Add New Portfolio',
            'edit_item'                     => 'Edit Portfolio',
            'new_item'                      => 'New Portfolio',
            'view_item'                     => 'View Portfolio',
            'search_items'                  => 'Search Portfolio',
            'not_found'                     => 'No Portfolio Found',
            'not_found_in_trash'            => 'No Portfolio Found in Trash',
            'all_items'                     => 'All Portfolios',
            'archives'                      => 'Portfolio Archives',
            'insert_into_item'              => 'Insert into Portfolio',
            'uploaded_to_this_item'         => 'Uploaded to this Portfolio',
            'featured_image'                => 'Portfolio Preview',
            'set_featured_image'            => 'Set Portfolio Preview',
            'remove_featured_image'         => 'Remove Portfolio Preview',
            'use_featured_image'            => 'Use as Portfolio Preview'
        ),
        'public'                    => true,
        'publicly_queryable'        => true,
        'has_archive'               => true,
        'supports'                  => array( 'title', 'thumbnail' )
    ));

    register_taxonomy('zion_portfolio_category', 'zion_portfolio',array(
        'labels'                => array(
            'name'                      => 'Portfolio Categories',
            'add_new'                   => 'Add New Category',
            'add_new_item'              => 'Add New Category',
            'edit_item'                 => 'Edit Category',
            'new_item'                  => 'New Portfolio Category',
            'view_item'                 => ''
        ),
        'public'                => true,
        'hierarchical'          => true
    ));
}
add_action('init', 'zion_portfolio_post_type', 5);


function zion_portfolio_metaboxes($metaboxes){
    $metaboxes[] = array(
        'title'                     => 'Project Summary',
        'post_types'                => 'zion_portfolio',
        'fields'                    => array(
            array(
                'id'                        => 'project_summary',
                'name'                      => '',
                'type'                      => 'textarea'
            )
        )
    );

    $metaboxes[] = array(
        'title'                     => 'Project Story',
        'post_types'                => 'zion_portfolio',
        'fields'                    => array(
            array(
                'id'                        => 'project_story',
                'name'                      => '',
                'type'                      => 'wysiwyg'
            )
        )
    );

    $metaboxes[] = array(
        'title'                     => 'Project Details',
        'post_types'                => 'zion_portfolio',
        'fields'                    => array(
            array(
                'id'                        => 'client_name',
                'name'                      => 'Client',
                'type'                      => 'text'
            ),
            array(
                'id'                        => 'project_date',
                'name'                      => 'Date',
                'type'                      => 'date'
            ),
            array(
                'id'                        => 'project_link',
                'name'                      => 'Project Link',
                'type'                      => 'url'
            )
        )
    );

    $metaboxes[] = array(
        'title'                     => 'Project Images',
        'post_types'                => 'zion_portfolio',
        'fields'                    => array(
            array(
                'id'                        => 'project_images',
                'name'                      => '',
                'type'                      => 'image_advanced'
            )
        )
    );

    return $metaboxes;
}
add_filter('rwmb_meta_boxes', 'zion_portfolio_metaboxes');
?>