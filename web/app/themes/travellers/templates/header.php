<div class="main-navigation">

	<nav class="collapsed js-navbar--main navbar js-navbar" role="navigation">
		<?php
		if (has_nav_menu('primary_navigation')) :
			wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
		endif;
		?>
	</nav>  

	<nav class="collapsed js-navbar--languages navbar js-navbar" role="navigation">
		<?php
		if (has_nav_menu('language_navigation')) :
			wp_nav_menu(array('theme_location' => 'language_navigation', 'menu_class' => 'nav navbar--languages__ul'));
		endif;
		?>
	</nav>

	<nav class="collapsed js-navbar--contact navbar js-navbar" role="navigation">
	<?php //maybe this one is a manual one using options ?>
		<?php
		if (has_nav_menu('contact_navigation')) :
			wp_nav_menu(array('theme_location' => 'language_navigation', 'menu_class' => 'nav navbar--contact__ul'));
		endif;
		?>
	</nav>

	<div class="nav-mask  js-nav-mask"></div>

</div>
<header class="banner-container" role="banner">
	<div class="container banner">

		<div class="navbar-toggle nav__item js-navbar-toggle" data-toggle="collapse" data-target=".js-navbar--main">
			<span class="burger__bar"></span>
			<span class="burger__bar"></span>
			<span class="burger__bar"></span>
		</div>
		<a class="navbar-brand js-site-nav" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
		<!-- <div class="navbar-toggle nav__item js-navbar-toggle" data-toggle="collapse" data-target=".js-n">
			<a class="">Contact</a>
		</div> -->
	</div>

</header>
