<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
    <![endif]-->

    <?php
    do_action('get_header');
    get_template_part('templates/header');
    ?>

    <div class="wrap container" role="document">
        <div id="main-content" class="scene_element scene_element--fadein">

            <div class="content row  scene_element scene_element--fadein">
                <div class="booking-bar-container">
                    <div class="booking-bar  js-booking-bar">
                        <div  class="menu-book-your-room big-fish"title="booking">Book your room</div>

                        <?php include( 'templates/maxbooking__include.php'); ?>                 
                        <?php //REMOVED FOR NOW ?>
                        <?php //if ( false ) ://(roots_display_sidebar()) : ?>
                             <aside class="sidebar" role="complementary">
                                <?php include roots_sidebar_path(); ?>
                            </aside><!-- /.sidebar -->
                        <?php // endif; ?>
                    </div>
                </div>
                <main class="main" role="main">
                    
                    <div class="main-navigation">

                        <nav class="collapsed js-navbar--main navbar js-navbar" role="navigation">
                            <?php
                            if (has_nav_menu('primary_navigation')) :
                                wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'navbar__nav navbar--main'));
                            endif;
                            ?>
                            <?php
                            if (has_nav_menu('language_navigation')) :
                                wp_nav_menu(array('theme_location' => 'language_navigation', 'menu_class' => 'navbar__nav navbar--languages__ul'));
                            endif;
                            ?>
                        </nav>  
                        <nav class="collapsed js-navbar--contact navbar js-navbar" role="contact">
                            <?php
                            if (has_nav_menu('contact_navigation')) :
                                wp_nav_menu(array('theme_location' => 'contact_navigation', 'menu_class' => 'navbar__nav navbar--contact__ul'));
                            endif;
                            ?>
                        </nav>  
                        
                        <div class="nav-mask  js-nav-mask"></div>

                    </div>
                    <div class="main__the-page">
                        <?php 
                            global $post;
                            setup_postdata( $post ); 
                        ?>
                        <?php include roots_template_path(); ?>
                    </div>
                </main><!-- /.main -->

            </div><!-- /.content -->
        </div><!-- /.main-content -->
    </div><!-- /.wrap -->

    <?php get_template_part('templates/footer'); ?>

    <?php wp_footer(); ?>

</body>
</html>