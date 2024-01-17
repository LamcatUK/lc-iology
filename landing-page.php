<?php
/* Template Name: Landing Page */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header('landing');
?>
<style>
    .landing-grid {
        display: grid;
        width: min(300px, 90vw);
        gap: 2rem;
        margin-inline: auto;
        margin-bottom: 2rem;
    }

    .landing-grid img {
        width: min(600px, 90vw);
        margin-bottom: 1rem;
    }

    .landing-grid a {
        display: block;
        width: 100%;
    }
</style>
<main>
    <div class="landing-grid">
        <img src="<?=get_stylesheet_directory_uri()?>/img/iology-logo--colour.svg"
            class="logo" width="93" height="32" alt="iology Limited">


        <a href="https://iology.co.uk/book-appointment/" class="btn btn-primary">Book an Appointment</a>

        <a href="https://api.whatsapp.com/send?phone=+447496971203&text=Hi,%20I%27m%20contacting%20you%20from%20the%20iology%20website."
            class="btn btn-primary">Contact via WhatsApp</a>

        <a href="https://iology.co.uk/leave-review/" class="btn btn-primary">Leave a Review</a>

    </div>
</main>
<div class="footer">
    <div class="container pt-4 pb-2">
        <div class="row g-4">
            <div class="col-12 mb-4 text-center">
                Iology incorporating Aves Opticians<br>
                55 Ripple Road, Barking,<br>
                England, IG11 7PG
            </div>
            <div class="col-12 text-center text-lg-start">
                <a
                    href="mailto:<?=get_field('email', 'options')?>"><i
                        class="fa-solid fa-envelope"></i>
                    <?=get_field('email', 'options')?></a>
                <a
                    href="tel:<?=parse_phone(get_field('phone', 'options'))?>"><i
                        class="fa-solid fa-phone"></i>
                    <?=get_field('phone', 'options')?></a>
                <a
                    href="tel:<?=parse_phone(get_field('mobile', 'options'))?>"><i
                        class="fa-solid fa-mobile-screen"></i>
                    <?=get_field('mobile', 'options')?></a>
            </div>
        </div>
    </div>
</div>
<div class="colophon">
    <div class="container d-flex justify-content-between flex-wrap pb-2 pt-2">
        <div class="text-center mx-auto mb-4 mb-lg-0 ms-lg-0">&copy;
            <?=date('Y')?> Eyes London Barking
            Ltd t/a iology incorporating Aves Opticians
            Limited. Registered in England no. 11860174
        </div>
        <div class="text-center mx-auto me-lg-0">
            <a href="/privacy/">Privacy</a> &amp; <a href="/cookies/">Cookies</a> | Site by <a
                href="https://www.lamcat.co.uk/" target="_blank">Lamcat</a>
        </div>
    </div>
</div>

<?php
get_footer('landing');
?>