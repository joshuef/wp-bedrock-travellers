<?php
/*
Template Name: Home Page
*/

?>
<div class="showcase  js-showcase">
    <div class="slider__container">
        <div class="js-slider  slider">
            <?php 

            $page = get_page_by_path( 'slider' );

            $args = array(
            'order'          => 'ASC',
            'orderby'        => 'menu_order',
            'post_type'      => 'attachment',
            'post_parent'    => $page->ID,
            'post_mime_type' => 'image',
            'post_status'    => null,
            'numberposts'    => -1,
            // 'name'     => 'slider'
            );

            $attachments = get_posts($args);

            $slideNumber = 1;

            if ($attachments) 
            {
                echo '<ul class="bjqs  slider__ul  js-slider__ul">';

                foreach ($attachments as $attachment) 
                {
                    if( $slideNumber === 1 )
                    {
                        echo '<li>';
                        echo '<img src="' . wp_get_attachment_image_src($attachment->ID, 'medium', false, false)[0] . '"/>';
                    }
                    else
                    {
                        echo '<li class="js-slide" data-lazy-image="'. wp_get_attachment_image_src($attachment->ID, 'medium', false, false)[0] .'">';
                        
                    }
                    echo '</li>';

                    $slideNumber++;
                }
                echo '</ul>';
            } 

     ?>
        </div>
    </div>
    <div class="showcase__pic  js-showcase__pic" data-lazy-image="http://lorempixel.com/480/259/" alt="">
    </div>
</div>
<div class="showcase__untertext">
    <?php dynamic_sidebar('sidebar-rooms'); ?>                   
    <?php dynamic_sidebar('sidebar-video'); ?>                   
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
        <div  class="homepage__vine js-vine__thumb" data-target-link="<?php _e( get_the_content() ); ?>" data-lazy-image='<?php _e( $thumb[0] );  ?>'></div>
    <?php endwhile; ?>

<?php endif; wp_reset_query(); ?>
</div>
<div class="vines__untertext">
    <?php dynamic_sidebar('sidebar-vine'); ?>                   
</div>


<div class="homepage__sections">
    <div class="homepage__section  tripadvisor">
        <a target="_blank" href="http://www.tripadvisor.com/">
            <img width="150"src="<?php _e(get_stylesheet_directory_uri()  . '/images/sowa.gif' ) ; ?>" alt="TripAdvisor"/>
        </a>
        <div id="TA_selfserveprop577" class="tripadvisor TA_selfserveprop">
          
        </div>
            <script src="http://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=577&amp;locationId=559605&amp;lang=en_US&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=false&amp;display_version=2"></script>
    </div>
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
                <a href="<?php the_permalink(); ?>">
                    <div class="icon-<?php _e( $icon ) ?>"></div>
                </a>
                <a href="<?php the_permalink(); ?>">
                    <h3 class="homepage__section__title"><?php the_title(); ?></h3>
                </a>

                <?php the_content(); ?>

            </div>

        <?php endwhile; ?>

    <?php endif; wp_reset_query(); ?>
    
</div>