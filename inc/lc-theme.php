<?php

require_once LC_THEME_DIR . '/inc/lc-performance.php';
require_once LC_THEME_DIR . '/inc/lc-utility.php';
require_once LC_THEME_DIR . '/inc/lc-posttypes.php';
require_once LC_THEME_DIR . '/inc/lc-blog.php';
require_once LC_THEME_DIR . '/inc/lc-blocks.php';

function widgets_init()
{
    register_nav_menus(array(
        'primary_nav' => 'Primary Nav',
    ));

    register_nav_menus(array(
        'footer_menu1' => 'Footer 1',
        'footer_menu2' => 'Footer 2',
    ));

    unregister_sidebar('hero');
    unregister_sidebar('herocanvas');
    unregister_sidebar('statichero');
    unregister_sidebar('left-sidebar');
    unregister_sidebar('right-sidebar');
    unregister_sidebar('footerfull');
    unregister_nav_menu('primary');

    // colours

    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => esc_html__( 'Light Green', 'lc-prenplants' ),
                'slug'  => 'lgreen',
                'color' => '#f3f8f6',
            ),
        )
    );


}
add_action('widgets_init', 'widgets_init', 11);

// override Gutenberg blocks here

add_filter( 'register_block_type_args', 'core_image_block_type_args', 10, 3 );
function core_image_block_type_args( $args, $name ) {
    if ( $name == 'core/paragraph' ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( $name == 'core/list' ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( $name == 'core/heading' ) {
        $args['render_callback'] = 'modify_core_heading';
    }
    if ($name == 'core/separator' ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/columns' ) {
        $args['render_callback'] = 'modify_core_add_breakout';
    }

    return $args;
}

function modify_core_add_container($attributes, $content) {
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

function modify_core_heading($attributes, $content) {
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

function modify_core_add_breakout($attributes, $content) {
    if (is_singular('post')) {
        return $content;
    }
    ob_start();
    if (preg_match('/breakout/', $attributes['className']) ) {
        $backColor = $attributes['backgroundColor'];
        ?>
        <div class="has-<?=$backColor?>-background-color has-background break-out py-5">
            <div class="container-xl mx-auto">
            <?=$content?>
            </div>
        </div>
        <?php
    }
    else {
        echo $content;
    }
    $content = ob_get_clean();
	return $content;
}


/*
add_filter( 'wpseo_breadcrumb_links', 'override_yoast_breadcrumb_trail' );

function override_yoast_breadcrumb_trail( $links ) {
    global $post;

    if ( is_tax('suppliers') ) {
        $breadcrumb[] = array(
            'url' => '/suppliers/',
            'text' => 'Suppliers',
        );
        array_splice( $links, 1, -2, $breadcrumb );
    }
    if ( is_singular('products') ) {
        $range = get_the_terms( $post, 'ranges' );
        $range_slug = $range[0]->slug;
        $range_name = $range[0]->name;

        $breadcrumb[] = array(
            'url' => '/ranges/' . $range_slug . '/',
            'text' => $range_name,
        );

        $supplier = get_the_terms( $post, 'suppliers' );
        $supp_slug = $supplier[0]->slug;
        $supp_name = $supplier[0]->name;

        $breadcrumb[] = array(
            'url' => '/suppliers/' . $supp_slug . '/',
            'text' => $supp_name,
        );

        array_splice( $links, 2, -1, $breadcrumb );
    }
    return $links;
}
*/

/*
function cb_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
    return $title;
}
 
add_filter( 'get_the_archive_title', 'cb_archive_title' );
*/

/*
function enable_svg_upload( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'enable_svg_upload', 10, 1 );
*/


function modalForm_func( $atts ) {
    ob_start();

    shortcode_atts(array(
        'formid' => 0,
        'text' => 'Click me',
        'title' => ''
    ), $atts);

    // trigger button
    echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">' . $atts['text'] . '</button>';

    // modal form
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title fs-5" id="exampleModalLabel"><?=$atts['title']?></div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?=do_shortcode('[contact-form-7 id="' . $atts['formid'] . '"]')?>
      </div>
    </div>
  </div>
</div>
    <?php

    $ob_str = ob_get_contents();
    ob_end_clean();
    return $ob_str;

}
add_shortcode( 'lc_modal_form', 'modalForm_func' );


/*------------ LOGIN BITS -----*/

function wpb_login_logo() {
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?=get_stylesheet_directory_uri() . '/img/prenplants-logo.png'?>);
        height:30px;
        width:320px;
        background-size: contain;
        background-repeat: no-repeat;
        padding-bottom: 10px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );

function wpb_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpb_login_logo_url' );
  
function wpb_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );
	
add_filter( 'login_display_language_dropdown', '__return_false' );


function wpcc_front_end_login_fail( $username ) {
    $referrer = $_SERVER['HTTP_REFERER']; 
    if ( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) {
      $referrer = esc_url( remove_query_arg( 'login', $referrer ) );
      wp_redirect( $referrer . '?login=failed' );
      exit;
    }
  }
add_action( 'wp_login_failed', 'wpcc_front_end_login_fail' );

function custom_authenticate_wpcc( $user, $username, $password ) {
    if ( is_wp_error( $user ) && isset( $_SERVER[ 'HTTP_REFERER' ] ) && !strpos( $_SERVER[ 'HTTP_REFERER' ], 'wp-admin' ) && !strpos( $_SERVER[ 'HTTP_REFERER' ], 'wp-login.php' ) ) {
      $referrer = $_SERVER[ 'HTTP_REFERER' ];
      foreach ( $user->errors as $key => $error ) {
          if ( in_array( $key, array( 'empty_password', 'empty_username') ) ) {
            unset( $user->errors[ $key ] );
            $user->errors[ 'custom_'.$key ] = $error;
          }
        }
    }
 
  return $user;
}
add_filter( 'authenticate', 'custom_authenticate_wpcc', 31, 3);



//Custom Dashboard Widget
add_action( 'wp_dashboard_setup', 'register_cb_dashboard_widget' );
function register_cb_dashboard_widget() {
	wp_add_dashboard_widget(
		'lc_dashboard_widget',
		'Lamcat',
		'lc_dashboard_widget_display'
	);

}

function lc_dashboard_widget_display() {
   ?>
    <div style="display: flex; align-items: center; justify-content: space-around;">
        <img style="width: 100%;" src="<?= get_stylesheet_directory_uri().'/img/lamcat.jpg'; ?>">
    </div>
    <div>
        <p style="text-align:center"><strong>Thank you for choosing Lamcat!</strong></p>
        <hr>
        <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
        <p>Use the button below to get in touch and we'll get back to you ASAP.</p>
        <p style="text-align:center"><a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer" href="mailto:hello@lamcat.co.uk">Contact</a></p>
    </div>
   <?php
}

