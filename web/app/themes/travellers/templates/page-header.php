<div class="page-header">
    <?php 
    if (has_post_thumbnail()) 
    {
        the_post_thumbnail('thumbnail');
    }
     ?>
  <h1>
    <?php echo roots_title(); ?>
  </h1>
</div>
