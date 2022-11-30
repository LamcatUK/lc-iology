<?php

function numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}

function recent_posts($post)
{
    ob_start();

    $q = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'post__not_in' => array( $post )
    ));

    if ($q->have_posts()) {
        ?>
        <div class="recent">
            <?php
            while ($q->have_posts()) {
                $q->the_post();
                $img = get_the_post_thumbnail_url(get_the_ID(),'medium') ? get_the_post_thumbnail_url(get_the_ID(),'medium') : catch_that_image(get_the_ID());
                ?>
                <a class="recent__post mb-3" href="<?=get_the_permalink()?>">
                    <div class="recent__image" style="background-image:url(<?=$img?>)"></div>
                    <div class="recent__inner">
                        <div class="recent__date"><?=get_the_date()?></div>
                        <div class="recent__title"><?=get_the_title()?></div>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
        <?php
    }

    wp_reset_postdata();
    $ob_str = ob_get_contents();
    ob_end_clean();
    return $ob_str;
}

function recent_posts_cols() {
    ob_start();

    $q = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
    ));

    if ($q->have_posts()) {
        ?>
        <div class="row recent">
            <?php
            while ($q->have_posts()) {
                $q->the_post();
                $img = get_the_post_thumbnail_url(get_the_ID(),'large') ? get_the_post_thumbnail_url(get_the_ID(),'large') : catch_that_image(get_the_ID());
                ?>
                <div class="col-md-4">
                    <a class="recent__post" href="<?=get_the_permalink()?>">
                        <div class="recent__image" style="background-image:url(<?=$img?>)"></div>
                        <div class="recent__inner">
                            <div class="recent__date"><?=get_the_date()?></div>
                            <div class="recent__title"><?=get_the_title()?></div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }

    wp_reset_postdata();
    $ob_str = ob_get_contents();
    ob_end_clean();
    return $ob_str;
}
