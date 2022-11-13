<?php
$flower = get_field('show_flower')[0] == 'Yes' ? 'bg--flower' : '';
?>
<!-- form -->
<section class="frm <?=$flower?> py-5">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-4">
                <h2><?=get_field('title')?></h2>
                <p><?=get_field('content')?></p>
            </div>
            <div class="col-lg-8">
                <div class="frm__card">
                    <?=do_shortcode('[contact-form-7 id="' . get_field('form_id') . '"]')?>
                </div>
            </div>
        </div>
    </div>
</section>