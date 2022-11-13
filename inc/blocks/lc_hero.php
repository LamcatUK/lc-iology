<!-- hero -->
<section class="hero mb-5">
    <div class="row h-100">
        <div class="col-md-6 contain_text--left">
            <h1><?=get_field('title')?></h1>
            <?php
            if (get_field('cta1')) {
                $c = get_field('cta1');
                $style = get_field('cta1_primary') ? 'btn-primary' : 'btn-secondary';
                ?>
            <a href="<?=$c['url']?>" target="<?=$c['target']?>" class="btn <?=$style?> me-2"><?=$c['title']?></a>
                <?php
            }
            if (get_field('cta2')) {
                $c = get_field('cta2');
                $style = get_field('cta2_primary') ? 'btn-primary' : 'btn-secondary';
                ?>
            <a href="<?=$c['url']?>" target="<?=$c['target']?>" class="btn <?=$style?>"><?=$c['title']?></a>
                <?php
            }
            ?>
        </div>
        <div class="col-md-6">
            <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <?php
                    if(get_field('slides')) {
                        $active = 'active';
                        $c = count(get_field('slides'));
                        if ($c > 1) {
                            echo '<div class="carousel-indicators">';
                            for ($i = 0; $i < $c; $i++) {
                                ?>
                            <button type="button" data-bs-target="#carousel" data-bs-slide-to="<?=$i?>" class="<?=$active?>"></button>
                                <?php
                                $active = '';
                            }
                            echo '</div>';
                        }
                        $active = 'active';
                        foreach (get_field('slides') as $slide) {
                            ?>
                        <div class="carousel-item h-100 <?=$active?>">
                            <div class="carousel__image" style="background-image:url(<?=wp_get_attachment_image_url( $slide, 'full' )?>)"></div>
                        </div>
                            <?php
                            $active = '';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>