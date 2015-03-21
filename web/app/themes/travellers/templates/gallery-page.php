<?php
/*
Template Name: Gallery Page
*/

?>

<div class="main__the-page">

<?php 
    
    global $post;

    $galleryImages = get_post_meta( $post->ID, '_trv_gallery_images' );




    foreach ($galleryImages as  $image ) 
    {
        foreach ( $image as $imageDetails ) 
        {
            // var_dump($imageDetails);
            $imageId = $imageDetails["_trv_gallery_image_file_id"] ;
            $image_attr = array(
               // 'class' => " js-gallery-image",

                // 'alt'   => trim(strip_tags( get_post_meta($attachment_id, '_wp_attachment_image_alt', true) )),
            );
            echo '<a href="'. $imageDetails[ '_trv_gallery_image_file'] .'" class="js-gallery-image">';
            //FYI wp_get_attachment_image( $attachment_id, $size, $icon, $attr );
                echo wp_get_attachment_image( $imageId, 'thumbnail', false, $image_attr ) ;
            echo '<a href="">';
        }
    }
    
 ?>    
</div>