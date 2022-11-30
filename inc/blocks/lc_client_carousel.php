<!-- suppliers carousel -->
<section class="suppliers_carousel bg--dark py-5">
<h2 class="mb-4"><?=get_field('title')?></h2>
<div class="suppliers mb-4">
        <?php
        $suppliers = new WP_Term_Query(array(
            'taxonomy' => 'clients',
            'hide_empty' => false
        ));
        foreach ($suppliers->terms as $s) {
            ?>
            <a class="supplier_card" href="<?=get_term_link($s)?>">
            <img class="supplier_card__logo" src="<?=wp_get_attachment_image_url( get_field('logo',$s), 'large')?>">
            </a>
            <?php
        }
        ?>
</div>
<div class="text-center"><a href="/suppliers/">View all</a></div>
</section>
<?php
add_action('wp_footer',function(){
    ?>
<script>
(function($){
    $('.suppliers').slick({
        infinite: true,
        dots: false,
        arrows: false,
        slidesToShow: 8,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 1000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 6,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
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