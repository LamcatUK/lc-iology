<?php

function acf_blocks()
{
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'				=> 'lc_hero',
            'title'				=> __('LC Hero'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_hero.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'image', 'hero' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block(array(
            'name'				=> 'lc_three_cards',
            'title'				=> __('LC Three Card Block'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_three_cards.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'three', 'cards' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block(array(
            'name'				=> 'lc_two_cols',
            'title'				=> __('LC Two Column Block'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_two_cols.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'two', 'cols' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block(array(
            'name'				=> 'lc_text_image',
            'title'				=> __('LC Text/Image Block'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_text_image.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'text', 'image' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block(array(
            'name'				=> 'lc_banner',
            'title'				=> __('LC Banner'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_banner.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'banner' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block(array(
            'name'				=> 'lc_testimonials',
            'title'				=> __('LC Testimonials'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_testimonials.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'testimonials' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block(array(
            'name'				=> 'lc_form',
            'title'				=> __('LC Form'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_form.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'form', ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block(array(
            'name'				=> 'lc_faq',
            'title'				=> __('LC FAQs'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_faq.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'faq', ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block(array(
            'name'				=> 'lc_button_bar',
            'title'				=> __('LC Button Bar'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_button_bar.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'button','bar', ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block(array(
            'name'				=> 'lc_contact_map',
            'title'				=> __('LC Contact & Map'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_contact_map.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'contact', 'map' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
        acf_register_block(array(
            'name'				=> 'lc_brand_grid',
            'title'				=> __('LC Brand Grid'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_brand_grid.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'brand', 'grid' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false, 'anchor' => true),
        ));
    }
}
add_action('acf/init', 'acf_blocks');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' 	=> 'Site-Wide Settings',
            'menu_title'	=> 'Site-Wide Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
        )
    );
}
