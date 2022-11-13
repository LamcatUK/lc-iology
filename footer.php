<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package lc-prenplants
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div class="footer">
    <div class="container pt-4 pb-2">
        <div class="row g-4">
            <div class=" col-lg-5 mb-4 d-flex justify-content-between flex-column">
                <div class="text-center text-md-start mb-3">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/prenplants-logo--wo.png" class="logo" width="600" height="75">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="fa-ul">
                            <li>
                                <span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span>
                                <?=get_field('address','options')?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="fa-ul">
                            <li>
                                <span class="fa-li"><i class="fa-solid fa-envelope"></i></span>
                                <a href="mailto:<?=get_field('email','options')?>"><?=get_field('email','options')?></a>
                            </li>
                            <li>
                                <span class="fa-li"><i class="fa-solid fa-phone"></i></span>
                                <a href="tel:<?=parse_phone(get_field('phone','options'))?>"><?=get_field('phone','options')?></a>
                            </li>
                            <li>
                                <span class="fa-li"><i class="fa-solid fa-fax"></i></span>
                                <?=get_field('fax','options')?>
                            </li>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 offset-lg-1">
                <?=wp_nav_menu( array('theme_location' => 'footer_menu1') )?>
                <?php
                if (is_user_logged_in()) {
                    ?>
                <ul class="menu">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?=wp_logout_url('/')?>">Log Out</a></li>
                </ul>
                    <?php
                }
                else {
                    ?>
                <ul class="menu">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/register/">Register</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/login/">Trade Login</a></li>
                </ul>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-6 col-lg-2">
            <?=wp_nav_menu( array('theme_location' => 'footer_menu2') )?>
            </div>
            <div class="col-md-6 col-lg-2">
                <div class="mb-2"><strong>Sign up to our newsletter</strong></div>
                <div class="mb-4">
                    <input type="text" class="form-control form-control-sm w-100 mb-2" placeholder="Replace with MailChimp">
                    <button class="btn btn-primary w-100">Subscribe</button>
                </div>
                <div class="text-center social">
                    <?=social_icons()?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="colophon">
    <div class="container d-flex justify-content-between flex-wrap pb-2 pt-2">
        <div class="text-center mx-auto mb-4 mb-lg-0 ms-lg-0">&copy; <?=date('Y')?> Prenplants Sussex Limited. Registered in Englant no. 09180992</div>
        <div class="text-center mx-auto me-lg-0">
            <a href="/privacy/">Privacy &amp; Cookies</a> | Site by <a href="https://www.lamcat.co.uk" target="_blank">Lamcat</a>
        </div>
    </div>
</div>
</div><!-- #page -->
<!-- <div class="enquire-button">Enquire</div> -->
<?php wp_footer();
if (get_field('gtm_property', 'options')) {
    ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?=get_field('gtm_property', 'options')?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php
}
?>
</body>

</html>

