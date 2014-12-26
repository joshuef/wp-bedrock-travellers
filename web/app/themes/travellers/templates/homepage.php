<?php
/*
Template Name: Home Page
*/

?>

<div class="main__the-page">
    <div class="showcase">
        <img class="showcase__slider" src="http://lorempixel.com/400/300/" alt="">
        <?php // more images loaded via js size hings ?>
    </div>
    <div class="copy">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
        
        <div class="homepage__sections">
            <?php
            global $post;

            $args = array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'post_parent'    => $post->ID,
                'order'          => 'ASC',
                'orderby'        => 'menu_order'
             );


            $sections = new WP_Query( $args );

            if ( $sections->have_posts() ) : ?>

                <?php while ( $sections->have_posts() ) : $sections->the_post(); ?>

                    <div id="parent-<?php the_ID(); ?>" class="homepage__section">

                        <h3><?php the_title(); ?></h1>

                        <?php the_content(); ?>

                    </div>

                <?php endwhile; ?>

            <?php endif; wp_reset_query(); ?>
            
        </div>
    </div>
    
</div>