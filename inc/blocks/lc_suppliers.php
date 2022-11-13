<!-- suppliers -->
<section class="suppliers mt-5">
    <div class="container-xl">
        <h2 class="h3 text-center">Suppliers to</h2>
        <div class="supplier mb-4">
        <?php
        $s = new WP_Query(array(
            'post_type' => 'clients',
            'posts_per_page' => -1
        ));
        while ($s->have_posts()) {
            $s->the_post();
            ?>
            <div class="supplier__card">
                <img class="supplier__logo" src="<?=get_the_post_thumbnail_url(get_the_ID(), 'large')?>">
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</section>
<?php
add_action('wp_footer',function(){
    ?>
<script>
(function($){
    $('.supplier').slick({
        infinite: true,
        dots: false,
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 1000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
})(jQuery);
</script>
    <?php
},9999);