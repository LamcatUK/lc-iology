<!-- contact_map -->
<section class="contact_map py-5">
    <div class="container-xl">
        <div class="w-lg-75 mx-auto contact_map__inner">
            <div class="row">
                <div class="col-md-5 py-4 px-5">
                    <h2 class="h4">Find Us</h2>
                    <ul class="fa-ul mb-4">
                        <li class="mb-2">
                            <span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span>
                            <?=get_field('address','options')?>
                        </li>
                        <li class="mb-4">
                            <span class="fa-li"><i class="fa-regular fa-compass"></i></span>
                            <a href="<?=get_field('directions','options')?>" target="_blank">Get Directions</a> 
                        </li>
                        <li class="mb-1">
                            <span class="fa-li"><i class="fa-solid fa-phone"></i></span>
                            <a href="tel:<?=parse_phone(get_field('phone','options'))?>"><?=get_field('phone','options')?></a>
                        </li>
                        <li class="mb-4">
                            <span class="fa-li"><i class="fa fa-fax"></i></span>
                            <?=get_field('fax','options')?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fa-solid fa-envelope"></i></span>
                            <a href="mailto:<?=get_field('email','options')?>"><?=get_field('email','options')?></a>
                        </li>
                    </ul>
                    <h2 class="h4">Find Us on Social Media</h2>
                    <div class="socials">
                        <?=social_icons()?>
                    </div>
                </div>
                <div class="col-md-7">
                    <iframe src="<?=get_field('maps_url','options')?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>