<?php

function parse_phone($phone)
{
    $phone = preg_replace('/\s+/', '', $phone);
    $phone = preg_replace('/\(0\)/', '', $phone);
    $phone = preg_replace('/[\(\)\.]/', '', $phone);
    $phone = preg_replace('/-/', '', $phone);
    $phone = preg_replace('/^0/', '+44', $phone);
    return $phone;
}

function split_lines($content)
{
    $content = preg_replace('/<br \/>/', '<br/>&nbsp;<br/>', $content);
    return $content;
}

add_shortcode('contact_phone', function ($atts) {
    $a = shortcode_atts(array(
        'class' => '',
    ), $atts);
    $output = '';
    if (get_field('phone', 'options')) {
        $output = '<a href="tel:' . parse_phone(get_field('phone', 'options')) . '" class="phone ' . $a['class'] . '">' . get_field('phone', 'options') . '</a>';
    }
    return $output;
});
add_shortcode('contact_email', function ($atts) {
    $a = shortcode_atts(array(
        'class' => '',
    ), $atts);
    $output = '';
    if (get_field('email', 'options')) {
        $output = '<a href="mailto:' . get_field('email', 'options') . '" class="email ' . $a['class'] . '">' . get_field('email', 'options') . '</a>';
    }
    return $output;
});

add_shortcode('contact_phone_text', function ($atts) {
    $a = shortcode_atts(array(
        'class' => '',
    ), $atts);
    $output = '';
    if (get_field('phone', 'options')) {
        $output = '<a href="tel:' . parse_phone(get_field('phone', 'options')) . '" class="phone ' . $a['class'] . '">phone</a>';
    }
    return $output;
});
add_shortcode('contact_email_text', function ($atts) {
    $a = shortcode_atts(array(
        'class' => '',
    ), $atts);
    $output = '';
    if (get_field('email', 'options')) {
        $output = '<a href="mailto:' . get_field('email', 'options') . '" class="email ' . $a['class'] . '">email</a>';
    }
    return $output;
});

add_shortcode('social_fb_icon', function () {
    $social = get_field('social', 'options');
    $fburl = $social['facebook_url'];
    if ($fburl != '') {
        $output = '<a href="' . $fburl . '" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>';
    }
    return $output;
});
add_shortcode('social_ig_icon', function () {
    $social = get_field('social', 'options');
    $igurl = $social['instagram_url'];
    if ($igurl != '') {
        $output = '<a href="' . $igurl . '" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>';
    }
    return $output;
});
add_shortcode('social_tw_icon', function () {
    $social = get_field('social', 'options');
    $twurl = $social['twitter_url'];
    if ($twurl != '') {
        $output = '<a href="' . $twurl . '" target="_blank" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>';
    }
    return $output;
});
add_shortcode('social_li_icon', function () {
    $social = get_field('social', 'options');
    $liurl = $social['linkedin_url'];
    if ($liurl != '') {
        $output = '<a href="' . $liurl . '" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>';
    }
    return $output;
});

function social_icons()
{
    ob_start();
    $social = get_field('social', 'options');
    if ($social['twitter_url']) {
        ?>
<a href="<?=$social['twitter_url']?>"
    target="_blank" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
<?php
    }
    if ($social['facebook_url']) {
        ?>
<a href="<?=$social['facebook_url']?>"
    target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
<?php
    }
    if ($social['linkedin_url']) {
        ?>
<a href="<?=$social['linkedin_url']?>"
    target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
<?php
    }
    if ($social['instagram_url']) {
        ?>
<a href="<?=$social['instagram_url']?>"
    target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
<?php
    }
    $ob_str = ob_get_contents();
    ob_end_clean();
    return $ob_str;
}
add_shortcode('social_icons', 'social_icons');



/**
 * Grab the specified data like Thumbnail URL of a publicly embeddable video hosted on Vimeo.
 *
 * @param  str $video_id The ID of a Vimeo video.
 * @param  str $data 	  Video data to be fetched
 * @return str            The specified data
 */
function get_vimeo_data_from_id($video_id, $data)
{
    // width can be 100, 200, 295, 640, 960 or 1280
    $request = wp_remote_get('https://vimeo.com/api/oembed.json?url=https://vimeo.com/' . $video_id . '&width=960');
    
    $response = wp_remote_retrieve_body($request);
    
    $video_array = json_decode($response, true);
    
    return $video_array[$data];
}


function gb_gutenberg_admin_styles()
{
    echo '
        <style>
            /* Main column width */
            .wp-block {
                max-width: 1040px;
            }
 
            /* Width of "wide" blocks */
            .wp-block[data-align="wide"] {
                max-width: 1080px;
            }
 
            /* Width of "full-wide" blocks */
            .wp-block[data-align="full"] {
                max-width: none;
            }
            #edittag {
                max-width: 1200px;
            }
        </style>
    ';
}
add_action('admin_head', 'gb_gutenberg_admin_styles');


function get_the_top_ancestor_id()
{
    global $post;
    if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    } else {
        return $post->ID;
    }
}

function lc_json_encode($string)
{
    // $value = json_encode($string);
    $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
    $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
    $result = str_replace($escapers, $replacements, $string);
    $result = json_encode($result);
    return $result;
}

function lc_time_to_8601($string)
{
    $time = explode(':', $string);
    $output = 'PT' . $time[0] . 'H' . $time[1] . 'M' . $time[2] . 'S';
    return $output;
}


function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

function lcdump($var)
{
    echo '<pre class="small">';
    print_r($var);
    echo '</pre>';
    return;
}

function formatBytes($bytes, $precision = 2)
{
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    // Uncomment one of the following alternatives
    // $bytes /= pow(1024, $pow);
    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}

/*
// hide taxonomy metaboxes
add_filter( 'rest_prepare_taxonomy', function( $response, $taxonomy, $request ){
    $context = ! empty( $request['context'] ) ? $request['context'] : 'view';
    // Context is edit in the editor
    if( $context === 'edit' && $taxonomy->meta_box_cb === false ){
        $data_response = $response->get_data();
        $data_response['visibility']['show_ui'] = false;
        $response->set_data( $data_response );
        }
    return $response;
}, 10, 3 );
*/

function enable_strict_transport_security_hsts_header()
{
    header('Strict-Transport-Security: max-age=31536000');
}
add_action('send_headers', 'enable_strict_transport_security_hsts_header');


function lc_list($field)
{
    ob_start();
    $field = strip_tags($field, '<br />');
    $bullets = preg_split("/\r\n|\n|\r/", $field);
    foreach ($bullets as $b) {
        if ($b == '') {
            continue;
        }
        ?>
<li><?=$b?></li>
<?php
    }
    return ob_get_clean();
}

// grab first image from post

function catch_that_image($postID)
{
    // global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $content = get_the_content(null, null, $postID);
    
    preg_match_all('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*)/i', $content, $matches);

    $first_img = $matches [1] [0];
    if (empty($first_img)) { //Defines a default image
        $first_img = get_stylesheet_directory_uri() . '/img/default-blog.jpg';
    }
    return $first_img;
}

function lc_orientation($id, $size = 'full')
{
    $img = wp_get_attachment_image_src($id, $size);
    if (isset($img)) {
        $width = $img[1];
        $height = $img[2];
        if ($width >= $height) {
            return 'landscape';
        } else {
            return 'portrait';
        }
    }
    return;
}

?>