<!-- banner -->
<section class="banner py-1">
    <div class="container-xl text-center d-md-flex justify-content-center align-items-center">
        <?php
        if (get_field('icon')) {
            $icon = wp_get_attachment_image_url(get_field('icon'),'full');
            ?>
        <img class="banner__icon me-4" src="<?=$icon?>">
            <?php
        }
        ?>
        <div class="banner__content"><?=get_field('content')?></div>
    </div>
</section>