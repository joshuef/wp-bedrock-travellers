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
    
</div>