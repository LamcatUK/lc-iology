<?php

function create_posttype()
{
    register_post_type(
        'testimonials',
        array(
            'labels' => array(
                'name' => __('Testimonials'),
                'singular_name' => __('Testimonial')
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
add_action('init', 'create_posttype');
