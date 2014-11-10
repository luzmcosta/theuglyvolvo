<?php
/* Template Name: Archives */
?>

<div id="primary" class="site-content">
    <div id="content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>

        <div class="entry-content">
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
        </div><!-- .entry-content -->

        <?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
</div><!-- #primary -->
