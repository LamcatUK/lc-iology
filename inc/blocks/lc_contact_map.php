<!-- contact_map -->
<section class="contact_map pt-5 pb-4">
    <div class="container-xl">
        <h2>Find Us</h2>
        <div class="row g-4">
            <div class="col-md-5">
                <div class="open card mb-4">
                    <h3>Opening Hours</h3>
                    <?=do_shortcode('[lc_open_ajax]')?>
                </div>
                <div class="contact card">
                    <ul class="fa-ul mb-2">
                        <li class="mb-2">
                            <span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span>
                            <?=get_field('address', 'options')?>
                        </li>
                        <li class="mb-4">
                            <span class="fa-li"><i class="fa-regular fa-compass"></i></span>
                            <a href="<?=get_field('directions', 'options')?>"
                                target="_blank">Get Directions</a>
                        </li>
                        <li class="mb-1">
                            <span class="fa-li"><i class="fa-solid fa-phone"></i></span>
                            <a
                                href="tel:<?=parse_phone(get_field('phone', 'options'))?>"><?=get_field('phone', 'options')?></a>
                        </li>
                        <li class="mb-1">
                            <span class="fa-li"><i class="fa-solid fa-mobile-screen"></i></span>
                            <a
                                href="tel:<?=parse_phone(get_field('mobile', 'options'))?>"><?=get_field('mobile', 'options')?></a>
                        </li>
                        <li class="mb-1">
                            <span class="fa-li"><i class="fa-solid fa-envelope"></i></span>
                            <a
                                href="mailto:<?=get_field('email', 'options')?>"><?=get_field('email', 'options')?></a>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fa-brands fa-whatsapp"></i></span>
                            <a target="_blank"
                                href="https://api.whatsapp.com/send?phone=<?=parse_phone(get_field('mobile', 'options'))?>&text=<?=htmlspecialchars("Hi, I'm contacting you from the iology website.")?>">
                                WhatsApp</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7">
                <iframe class="card map p-0" title="Map"
                    src="<?=get_field('maps_url', 'options')?>"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>