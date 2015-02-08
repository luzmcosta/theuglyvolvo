<?php
/* Template Name: Posts by Most Popular */
?>

<div id="primary" class="site-content">
    <div id="content" role="main">

    <?php

    // Set the parameters of the desired posts.
    $args = array('posts_per_page' => -1, 'category_name' => 'most-popular',
        'order_by' => 'comment_count');
    // Get posts matching the given parameters.
    $posts = get_posts( $args );

    foreach ( $posts as $post ) : setup_postdata( $post ); ?>
        <article class="entry-content most-popular-posts">
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <!-- Get featured image or first image on page. -->
            <?php get_main_image($post_id); ?>
        </article><!-- .entry-content -->
    <?php endforeach;

    // Reset.
    wp_reset_postdata();

    ?>

    </div><!-- #content -->
</div><!-- #primary -->
