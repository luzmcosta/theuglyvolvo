<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container-fluid">
    <div class="social-navbar">
      <div class="social">
        <?php dynamic_sidebar('sidebar-social'); ?>
      </div>

      <div class="share">
        <?php dynamic_sidebar('sidebar-share'); ?>
      </div>

      <div class="menu-icon">
          <i class="fa fa-bars fa-3x"></i>
      </div>
    </div>

    <div class="header-brand">
        <div>
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" /></a>
        </div>
    </div>

    <div class="header-navbar">
        <nav class="collapse navbar-collapse" role="navigation">
            <?php
                if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
                endif;
            ?>
        </nav>
    </div>
  </div>
</header>
