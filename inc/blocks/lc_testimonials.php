<!-- testimonials -->
<section class="testimonials py-5">
    <div class="container-xl">
        <h2 class="h3 text-center mb-4">What Our Customers Say</h2>
        <div class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $active = 'active';
                $ps = new WP_Query(array(
                    'post_type' => 'testimonials',
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                while ($ps->have_posts()) {
                    $ps->the_post();
                    ?>
                <div class="carousel-item text-center <?=$active?>">
                    <?=get_the_content()?>
                </div>
                    <?php
                    $active = '';
                }
                ?>
            </div>
        </div>
    </div>
</section>