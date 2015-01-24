<header class="banner-container" role="banner">
	<div class="container banner">

		<div class="navbar-toggle js-navbar-toggle" data-toggle="collapse" data-target=".js-navbar--main">
			<span class="burger__bar"></span>
			<span class="burger__bar"></span>
			<span class="burger__bar"></span>
		</div>
		<div class="suitcases icon-cases">
			<!-- DnG baby -->
		</div>
		<a class="navbar-brand js-site-nav" href="<?php echo esc_url(home_url('/')); ?>">
			<div class="icon-t  logo">
				<!-- logooooo -->
			</div>
			<?php bloginfo('name'); ?>
		</a>
	</div>

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
</header>
