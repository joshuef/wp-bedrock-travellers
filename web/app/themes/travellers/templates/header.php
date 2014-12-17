<div class="main-navigation">
    
    <nav class="collapsed js-navbar--main navbar js-navbar" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          	wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>

    <div class="nav-mask  js-nav-mask"></div>

   

    <?php 

    // navbar can go inside. we can have a different one for languages
    // they just need to pop up, and we can have a wee close button there
    // 
    //   ?>
</div>
<header class="banner-container" role="banner">
  	<div class="container banner">

	    <a class="navbar-brand js-site-nav" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
  		<a class="navbar-toggle js-navbar-toggle" data-toggle="collapse" data-target=".js-navbar--main">
	        <span class="hidden">Toggle navigation</span>
	    </a>
  	</div>

</header>
