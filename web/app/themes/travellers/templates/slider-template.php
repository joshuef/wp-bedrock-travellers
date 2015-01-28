<?php
/*
Template Name: Slider-Template
*/
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

    if ($attachments) {
        foreach ($attachments as $attachment) {

        echo wp_get_attachment_link($attachment->ID, 'medium', false, false);
    }
    } 
?>