<!-- team_cards -->
<section class="team_cards py-5">
    <div class="container-xl">
        <div class="row g-4">
            <?php
            $q = new WP_Query(array(
                'post_type' => 'people',
                'posts_per_page' => -1,
                'post_status' => 'publish'
            ));
            while ($q->have_posts()) {
                $q->the_post();
                $img = get_the_post_thumbnail_url(get_the_ID(),'large');
                if (!$img) {
                    $img = get_stylesheet_directory_uri() . '/img/missing-person.jpg';
                }
                ?>
            <div class="col-lg-6">
                <div class="person__card">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="person__image" style="background-image:url(<?=$img?>)"></div>
                        </div>
                        <div class="col-sm-9">
                            <div class="person__name"><?=get_the_title()?><?php
                                if (get_field('linkedin_url',get_the_ID())) {
                                    ?>
                                    <a class="person__linkedin" href="<?=get_field('linkedin_url',get_the_ID())?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <?php
                                }
                            ?></div>
                            <?php
                            if (get_field('title',get_the_ID())) {
                                ?>
                            <div class="person__title"><?=get_field('title',get_the_ID())?></div>
                                <?php
                            }
                            ?>
                            <div class="person__bio"><?=get_field('bio',get_the_ID())?></div>
                        </div>
                    </div>
                </div>

            </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>