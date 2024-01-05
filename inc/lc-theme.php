<?php

require_once LC_THEME_DIR . '/inc/lc-performance.php';
require_once LC_THEME_DIR . '/inc/lc-utility.php';
require_once LC_THEME_DIR . '/inc/lc-posttypes.php';
// require_once LC_THEME_DIR . '/inc/lc-blog.php';
// require_once LC_THEME_DIR . '/inc/lc-careers.php';
require_once LC_THEME_DIR . '/inc/lc-blocks.php';

function widgets_init()
{
    register_nav_menus(array(
        'primary_nav' => 'Primary Nav',
    ));

    register_nav_menus(array(
        'footer_menu1' => 'Footer 1',
    ));

    unregister_sidebar('hero');
    unregister_sidebar('herocanvas');
    unregister_sidebar('statichero');
    unregister_sidebar('left-sidebar');
    unregister_sidebar('right-sidebar');
    unregister_sidebar('footerfull');
    unregister_nav_menu('primary');

    // colours

    // add_theme_support(
    //     'editor-color-palette',
    //     array(
    //         array(
    //             'name'  => esc_html__('Light Green', 'lc-iology'),
    //             'slug'  => 'lgreen',
    //             'color' => '#f3f8f6',
    //         ),
    //     )
    // );
}
add_action('widgets_init', 'widgets_init', 11);

// override Gutenberg blocks here

add_filter('register_block_type_args', 'core_image_block_type_args', 10, 3);
function core_image_block_type_args($args, $name)
{
    if ($name == 'core/paragraph') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/list') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/heading') {
        $args['render_callback'] = 'modify_core_heading';
    }
    if ($name == 'core/separator') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/columns') {
        $args['render_callback'] = 'modify_core_add_breakout';
    }

    return $args;
}

function modify_core_add_container($attributes, $content)
{
    if (is_singular('post')) {
        return $content;
    }
    ob_start();
    ?>
<div class="container-xl">
    <?=$content?>
</div>
<?php
    $content = ob_get_clean();
    return $content;
}

function modify_core_heading($attributes, $content)
{
    if (is_singular('post')) {
        return $content;
    }
    ob_start();
    ?>
<div class="container-xl">
    <?=$content?>
</div>
<?php
    $content = ob_get_clean();
    return $content;
}

function modify_core_add_breakout($attributes, $content)
{
    if (is_singular('post')) {
        return $content;
    }
    ob_start();
    if (array_key_exists('className', $attributes)) {
        if (preg_match('/breakout/', $attributes['className'])) {
            $backColor = $attributes['backgroundColor'];
            ?>
<div
    class="has-<?=$backColor?>-background-color has-background break-out py-5">
    <div class="container-xl mx-auto">
        <?=$content?>
    </div>
</div>
<?php
        }
    } else {
        ?>
<div class="container-xl mx-auto">
    <?=$content?>
</div>
<?php
    }
    $content = ob_get_clean();
    return $content;
}



add_filter('the_content', 'filter_the_content_in_the_main_loop', 1);

function filter_the_content_in_the_main_loop($content)
{
    // Check if we're inside the main loop in a single Post.
    if (is_singular() && in_the_loop() && is_main_query()) {
        $content = preg_replace('/iology([\s,])/', '<strong>iology</strong>$1', $content);
        return $content;
    }

    return $content;
}

/* whatsapp button */
function whatsapp($atts)
{
    ob_start();

    $default = array(
        'message' => "Hi, I'm contacting you from the iology website.",
        'label' => 'WhatsApp'
    );

    $a = shortcode_atts($default, $atts);
    $message = htmlspecialchars($a['message'], ENT_QUOTES);
    $label = $a['label'];

    $phone = parse_phone(get_field('mobile', 'options'));

    ?>
<a href="https://api.whatsapp.com/send?phone=<?=$phone?>&text=<?=$message?>"
    class="btn btn-primary me-2 mb-2" target="_blank"><?=$label?></a>
<?php

    return ob_get_clean();

}
add_shortcode('whatsapp_button', 'whatsapp');

/*------------ LOGIN BITS -----*/

function wpb_login_logo()
{
    ?>
<style type="text/css">
    #login h1 a,
    .login h1 a {
        background-image: url(<?=get_stylesheet_directory_uri() . '/img/iology-logo--colour.svg'?>);
        height: 64px;
        width: 180px;
        background-size: contain;
        background-repeat: no-repeat;
        padding-bottom: 10px;
    }
</style>
<?php }
add_action('login_enqueue_scripts', 'wpb_login_logo');

function wpb_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'wpb_login_logo_url');
  
function wpb_login_logo_url_title()
{
    return 'Your Site Name and Info';
}
add_filter('login_headertitle', 'wpb_login_logo_url_title');
    
add_filter('login_display_language_dropdown', '__return_false');


/*
function wpcc_front_end_login_fail($username)
{
    $referrer = $_SERVER['HTTP_REFERER'];
    if (!empty($referrer) && !strstr($referrer, 'wp-login') && !strstr($referrer, 'wp-admin')) {
        $referrer = esc_url(remove_query_arg('login', $referrer));
        wp_redirect($referrer . '?login=failed');
        exit;
    }
}
add_action('wp_login_failed', 'wpcc_front_end_login_fail');

function custom_authenticate_wpcc($user, $username, $password)
{
    if (is_wp_error($user) && isset($_SERVER[ 'HTTP_REFERER' ]) && !strpos($_SERVER[ 'HTTP_REFERER' ], 'wp-admin') && !strpos($_SERVER[ 'HTTP_REFERER' ], 'wp-login.php')) {
        $referrer = $_SERVER[ 'HTTP_REFERER' ];
        foreach ($user->errors as $key => $error) {
            if (in_array($key, array( 'empty_password', 'empty_username'))) {
                unset($user->errors[ $key ]);
                $user->errors[ 'custom_'.$key ] = $error;
            }
        }
    }

    return $user;
}
add_filter('authenticate', 'custom_authenticate_wpcc', 31, 3);
*/


//Custom Dashboard Widget
add_action('wp_dashboard_setup', 'register_cb_dashboard_widget');
function register_cb_dashboard_widget()
{
    wp_add_dashboard_widget(
        'lc_dashboard_widget',
        'Lamcat',
        'lc_dashboard_widget_display'
    );
}

function lc_dashboard_widget_display()
{
    ?>
<div style="display: flex; align-items: center; justify-content: space-around;">
    <img style="width: 100%;"
        src="<?= get_stylesheet_directory_uri().'/img/lamcat.jpg'; ?>">
</div>
<div>
    <p style="text-align:center"><strong>Thank you for choosing Lamcat!</strong></p>
    <hr>
    <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
    <p>Use the button below to get in touch and we'll get back to you ASAP.</p>
    <p style="text-align:center"><a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer"
            href="mailto:hello@lamcat.co.uk">Contact</a></p>
</div>
<?php
}


//---------------- menu diddling ---//

/*
add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
function add_admin_link($items, $args)
{
    if ($args->theme_location == 'primary_nav') {
        if (is_user_logged_in()) {
            $items .= '<li class="d-xl-none"><a href="' . wp_logout_url('/') . '" class="nav-link"><i class="fa-solid fa-user"></i> Log Out</a></li>';
        } else {
            $items .= '<li class="d-xl-none"><a href="/login/" class="nav-link"><i class="fa-solid fa-user"></i> Trade Login</a></li>';
        }
    }
    return $items;
}
*/

// add_filter('wp_nav_menu_objects', 'lc_add_menu_parent_class');
// function lc_add_menu_parent_class($items)
// {
//     // echo '<!-- <pre>';
//     // foreach ($items as $item) {
//     //     print_r($item);//print each menu item an get your parent menu item-id
//     // }
//     // echo '</pre> -->';
//     if (is_user_logged_in()) {
//         $link = array(
//             'title'            => 'Availability List',
//             'menu_item_parent' => 46,
//             'ID'               => '4321',
//             'url'              => '/stock/'
//         );
//     } else {
//         $link = array(
//             'title'            => 'Register',
//             'menu_item_parent' => 46,
//             'ID'               => '1234',
//             'url'              => '/'
//         );
//     }
//     $items[] = (object) $link;
//     return $items;
// }

// fix conditional fields inline
add_filter('wpcf7_autop_or_not', '__return_false');



?>