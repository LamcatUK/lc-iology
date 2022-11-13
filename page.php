<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$modal = 0;

$class = is_front_page() ? '' : 'main';

?>
<main id="main" class="<?=$class?>">
    <?php the_post(); the_content(); ?>
</main>
<?php
get_footer();