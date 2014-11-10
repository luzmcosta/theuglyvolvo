<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php // get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
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

    <?php // the_excerpt(); ?>
  </div>
</article>
