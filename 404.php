<?php get_template_part('templates/page', 'header'); ?>

<div class="alert alert-warning">
  <?php _e('Sorry, but the page you are trying to view does not exist.', 'roots'); ?>
</div>

<p>This may be the result of either a mistyped address or an out-of-date link.
    Perhaps a search will help you find your way.</p>

<?php get_search_form(); ?>
