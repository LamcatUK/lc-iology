<?php

function create_posttype() {

    register_post_type( 'people',
        array(
            'labels' => array(
                'name' => __( 'People' ),
                'singular_name' => __( 'Person' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => false,
            'show_in_rest' => true,
            'supports' => array( 'title', 'thumbnail' ),
            'menu_icon' => 'dashicons-groups',
        )
    );

    register_post_type( 'clients',
        array(
            'labels' => array(
                'name' => __( 'Clients' ),
                'singular_name' => __( 'Client' )
            ),
            'public' => true,
            'has_archive' => true,
            "rewrite" => false,
            'show_in_rest' => true,
            'supports' => array( 'title', 'thumbnail' ),
            'menu_icon' => 'dashicons-portfolio',
        )
    );

    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            "rewrite" => false,
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor' ),
            'menu_icon' => 'dashicons-format-quote',
        )
    );
}
add_action( 'init', 'create_posttype' );

