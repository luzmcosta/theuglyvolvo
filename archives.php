<?php
/* Template Name: Archives */
?>

<div id="primary" class="site-content">
    <div id="content" role="main">

        <?php query_posts('orderby=ID&order=ASC'); ?>

        <?php while ( have_posts() ) : the_post(); ?>

        <article class="entry-content old-posts">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <!-- Get featured image or first image on page. -->
            <?php get_main_image(the_ID()) ?>
        </article><!-- .entry-content -->

        <?php endwhile; // end of the loop. ?>

        <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>

	</div><!-- #content -->
</div><!-- #primary -->
