<?php
/* Template Name: Posts by Most Popular */
?>

<div id="primary" class="site-content">
    <div id="content" role="main">

    <?php query_posts('cat=402'); ?>

    <?php while ( have_posts() ) : the_post(); ?>

    <article class="entry-content most-popular-posts">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <?php if ( get_the_post_thumbnail($post_id) != '' ) {
                echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
                the_post_thumbnail( array(275, 250) );
                echo '</a>';
            } else {
                echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
                echo '<img src="' . get_first_image() . '" alt="" />';
                echo '</a>';
            }
        ?>
    </article><!-- .entry-content -->

    <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
</div><!-- #primary -->
