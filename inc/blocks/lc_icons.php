<!-- icons -->
<section class="icons py-5">
    <div class="container-xl">
        <div class="row g4 justify-content-center">
            <?php
            while(have_rows('icons')) {
                the_row();
                ?>
            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="icons__icon">
                    <img src="<?=wp_get_attachment_image_url(get_sub_field('icon'))?>">
                </div>
                <div class="icons__title">
                    <?=get_sub_field('title')?>
                </div>
            </div>
                <?php
            }
            ?>
        </div>
        <?php
        if (get_field('cta')) {
            $c = get_field('cta');
            ?>
<div class="text-center mt-5">
    <a href="<?=$c['url']?>" target="<?=$c['target']?>" class="btn btn-primary"><?=$c['title']?></a>
</div>
            <?php
        }
        ?>
    </div>
</section>