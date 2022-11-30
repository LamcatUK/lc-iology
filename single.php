<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
the_post();

$catnames = get_the_category(get_the_ID());
$catnameArr = array();
if ($catnames) {
    foreach ($catnames as $obj) {
        $catnameArr[] = '<a href="' . get_category_link( $obj->term_id ) . '">' . $obj->category_nicename . '</a>';
    }
}
$cats = implode(', ', $catnameArr);
$posttags = get_the_tags();
?>
<main id="main" class="main">
    <div class="container pt-4 pb-5">
        <div class="page-meta">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
            ?>
        </div>
        <div class="row single-news">
            <div class="col-md-9 mb-4">
                <?php
                if (get_the_post_thumbnail_url(get_the_ID())) {
                    ?>
                <div class="news__image mb-4" style="background-image:url(<?=get_the_post_thumbnail_url(get_the_ID(),'full')?>)"></div>
                    <?php
                    if (get_the_post_thumbnail_caption()) {
                        ?>
                    <div class="fw-bold mt-3 smallest col-12 col-md-10"><?=apply_filters('the_content',get_the_post_thumbnail_caption())?></div>
                        <?php
                    }
                }
                ?>
                <h1><?=get_the_title()?></h1>
                <div class="news__date mb-4"><strong>Date:</strong> <?=get_the_date('j F Y')?></div>
                <div class="news__container">
                    <?=apply_filters('the_content', get_the_content())?>
                </div>
                <div>
                    <?php /* cb_post_nav(); */ ?>
                </div>
            </div>
            <div class="col-md-3">
                <h2 class="h3">Latest Blogs</h2>
                <div class="mb-4"><?=recent_posts(get_the_ID())?></div>
                <div class="mb-4 p-4 newsletter">
                    <div class="mb-2"><strong>Sign up to our newsletter</strong></div>
                    <div class="mb-2">
                        <input type="text" class="form-control form-control-sm w-100 mb-2" placeholder="Replace with MailChimp">
                        <button class="btn btn-primary w-100">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php

get_footer();
