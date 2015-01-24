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
        <div id="main-content" class="fonz-box scene_element scene_element--fadein">
            <div class="content row  scene_element scene_element--fadein">
                <div class="booking-bar">
                    <!--[if IE]> <iframe src="https://widget.maxbooking.com/index.php?id=2825" width="180" height="150" frameborder="0" scrolling="no"> <p><a href="https://book.maxbooking.com/index.php?id=2825">Book now</a></p> </iframe> <![endif]--> <!--[if !IE]><!--> <object type="text/html" data="https://widget.maxbooking.com/index.php?id=2825" style="width:180px;height:150px;margin:0;padding:0;overflow:hidden;"> <p><a href="https://book.maxbooking.com/index.php?id=2825">Book now</a></p> </object> <!--<![endif]--> 
                 
                    <?php //REMOVED FOR NOW ?>
                    <?php //if ( false ) ://(roots_display_sidebar()) : ?>
                         <aside class="sidebar" role="complementary">
                            <?php include roots_sidebar_path(); ?>
                        </aside><!-- /.sidebar -->
                    <?php // endif; ?>
                </div>
                <main class="main" role="main">
                <?php 
                    global $post;
                    setup_postdata( $post ); 
                ?>
                    <?php include roots_template_path(); ?>
                </main><!-- /.main -->

            </div><!-- /.content -->
            <?php get_template_part('templates/footer'); ?>

            <?php wp_footer(); ?>
        </div><!-- /.main-content -->
    </div><!-- /.wrap -->


</body>
</html>
