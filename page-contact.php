<?php
/* Template Name: Contact */
?>

<div id="primary" class="site-content">
    <div id="content" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

    <div class="entry-content contact">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

    <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
</div><!-- #primary -->
