<?php
/**
 * The main template file
 *
 * @package lc-prenplants
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
$img = $img[0];
?>
<main id="main">
<section class="hero">
    <div class="row h-100">
        <div class="col-md-6 contain_text--left">
            <h1>Prenplants News &amp; Insights</h1>
        </div>
        <div class="col-md-6">
            <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item h-100 active">
                        <div class="carousel__image" style="background-image:url(<?=$img?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <div class="container-xl py-5">
        <div id="blogs" class="mb-4">
            <div class="row g-5">
            <?php
            while (have_posts()) {
                the_post();
                $cats = get_the_category();
                $cat = $cats[0]->slug;
                $img = get_the_post_thumbnail_url(get_the_ID(),'large') ? get_the_post_thumbnail_url(get_the_ID(),'large') : catch_that_image(get_the_ID());
                ?>
                <div class="col-md-6 col-lg-4 blog-item">
                    <a href="<?=get_the_permalink()?>" class="news__inner">
                        <div class="news__image" style="background-image:url(<?=$img?>)"></div>
                        <div class="news__bottom">
                            <div class="news__meta">
                                <div class="news__title"><?=get_the_title()?></div>
                                <div class="news__date"><?=get_the_date('j M, Y')?></div>
                            </div>
                            <div class="news__intro"><?=wp_trim_words(get_the_content(),30)?></div>
                            <div class="news__link">Read more</div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
            </div>
        </div>
        <?=numeric_posts_nav()?>
    </div>
</section>
</main>
<?php

get_footer();
