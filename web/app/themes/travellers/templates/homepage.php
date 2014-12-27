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
    </div>
    <div class="homepage__vines">
    <?php

        $vines = array(
            'posts_per_page' => 4,
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'category_name' => 'vines'
        );


        $all_vines = new WP_Query( $vines );

       if ( $all_vines->have_posts() ) : ?>

        <?php while ( $all_vines->have_posts() ) : $all_vines->the_post(); ?>
            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' ); ?>
            <div  class="homepage__vine js-vine__thumb" data-vine-link="<?php _e( get_the_content() ); ?>" data-vine='<?php _e( $thumb[0] );  ?>'></div>
        <?php endwhile; ?>

    <?php endif; wp_reset_query(); ?>
    </div>
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
                    <?php
                        // Grab the metadata from the database
                        $icon = get_post_meta( get_the_ID(), '_trv_icon', true ); ?>
                    <div class="<?php _e( $icon ) ?>"></div>
                    <h3><?php the_title(); ?></h1>

                    <?php the_content(); ?>

                </div>

            <?php endwhile; ?>

        <?php endif; wp_reset_query(); ?>
        
    </div>
    
</div>