<?php

$cards = array(
    get_field('card_1_title'),
    get_field('card_2_title'),
    get_field('card_3_title'),
    get_field('card_4_title')
);

$numCards = count(array_filter($cards, function($x) { return !empty($x); }));

$cardSize = $numCards == 4 ? 'col-md-6 col-lg-3' : 'col-md-4';

?>
<!-- cards -->
<section class="three_cards py-5 mt-5">
    <div class="container-xl">
        <div class="row g-4">
            <?php
            if (get_field('card_1_link')) {
                ?>
            <div class="<?=$cardSize?>">
                <?php
                $bg = wp_get_attachment_image_url(get_field('card_1_bg'),'large');
                $c = get_field('card_1_link');
                ?>
                <a href="<?=$c['url']?>" target="<?=$c['target']?>">
                    <div class="card">
                        <div class="card__image" style="background-image:url(<?=$bg?>)"></div>
                        <div class="card__bottom"><?=get_field('card_1_title')?></div>
                    </div>
                </a>
            </div>
            <?php
            }
            if (get_field('card_2_link')) {
                ?>
            <div class="<?=$cardSize?>">
                <?php
                $bg = wp_get_attachment_image_url(get_field('card_2_bg'),'large');
                $c = get_field('card_2_link');
                ?>
                <a href="<?=$c['url']?>" target="<?=$c['target']?>">
                    <div class="card">
                        <div class="card__image" style="background-image:url(<?=$bg?>)"></div>
                        <div class="card__bottom"><?=get_field('card_2_title')?></div>
                    </div>
                </a>
            </div>
            <?php
            }
            if (get_field('card_3_link')) {
                ?>
            <div class="<?=$cardSize?>">
                <?php
                $bg = wp_get_attachment_image_url(get_field('card_3_bg'),'large');
                $c = get_field('card_3_link');
                ?>
                <a href="<?=$c['url']?>" target="<?=$c['target']?>">
                    <div class="card">
                        <div class="card__image" style="background-image:url(<?=$bg?>)"></div>
                        <div class="card__bottom"><?=get_field('card_3_title')?></div>
                    </div>
                </a>
            </div>
            <?php
            }
            if (get_field('card_4_link')) {
                ?>
            <div class="<?=$cardSize?>">
                <?php
                $bg = wp_get_attachment_image_url(get_field('card_4_bg'),'large');
                $c = get_field('card_4_link');
                ?>
                <a href="<?=$c['url']?>" target="<?=$c['target']?>">
                    <div class="card">
                        <div class="card__image" style="background-image:url(<?=$bg?>)"></div>
                        <div class="card__bottom"><?=get_field('card_4_title')?></div>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
        <?php
        if (get_field('after_text')) {
            ?>
            <div class="text-center mt-5">
                <?=get_field('after_text')?>
            </div>
            <?php            
        }
        if (get_field('after_cta')) {
            $c = get_field('after_cta');
            ?>
            <div class="text-center mt-4">
                <a href="<?=$c['url']?>" target="<?=$c['target']?>" class="btn btn-primary"><?=$c['title']?></a>
            </div>
            <?php            
        }
        ?>
    </div>
</section>