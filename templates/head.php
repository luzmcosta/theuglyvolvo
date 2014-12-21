<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="description" content="A website for anyone with both a child and a sense of humor." />
  <meta property="og:url" content="<?php echo the_permalink(); ?>" />
  <meta property="og:title" content="<?php echo wp_title('|', true, 'right'); ?>" />
  <meta property="og:description" content="Attempts at Adulthood" />
  <meta property="og:image" content="<?php echo get_bloginfo('template_directory') ?>/assets/img/theuglyvolvo_logo@1x.png; ?>" />

  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
</head>
