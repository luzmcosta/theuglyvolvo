<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container-fluid">

      <div class="social-navbar">
          <div class="search">
              <?php dynamic_sidebar('sidebar-search'); ?>
          </div>

          <div class="social">
        <?php dynamic_sidebar('sidebar-social'); ?>
      </div>

      <div class="share">
        <?php dynamic_sidebar('sidebar-share'); ?>
      </div>
    </div>

    <div class="menu-icon">
        <i class="fa fa-bars fa-3x"></i>
    </div>

    <div class="header-brand">
        <div class="floor"></div>

        <div>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <picture>
                    <img src="<?php echo get_bloginfo('template_directory') ?>/assets/img/theuglyvolvo_logo@2x.png"
                        alt="<?php echo( get_bloginfo( 'title' ) ); ?>"
                    />
                <picture>
            </a>
        </div>
    </div>

    <div class="header-navbar">
        <nav class="collapse navbar-collapse" role="navigation">
            <?php
                if (has_nav_menu('primary_navigation')) {
                    $walker = new Menu_With_Description;
                    wp_nav_menu( array( 'theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav', 'walker' => $walker ) );
                }
            ?>
        </nav>
    </div>
  </div>
</header>
