<header class="banner-container" role="banner">
	<div class="container banner">
		<div class="banner__navs">
			<nav class="js-navbar--language--top  navbar--language--top">
				<?php
				if (has_nav_menu('language_navigation')) :
					wp_nav_menu(array('theme_location' => 'language_navigation', 'menu_class' => 'navbar__nav navbar--languages__ul--top'));
				endif;
				?>
			</nav> 
			<nav class="js-navbar--contact--top navbar--contact--top" role="contact-top">
				<?php
				if (has_nav_menu('contact_navigation--top')) :
					wp_nav_menu(array('theme_location' => 'contact_navigation--top', 'menu_class' => 'navbar--contact--top__ul'));
				endif;
				?>
			</nav> 
			
		</div>

		<div class="navbar-toggle js-navbar-toggle" data-toggle="collapse" data-target=".js-navbar--main">
			<span class="burger__bar"></span>
			<span class="burger__bar"></span>
			<span class="burger__bar"></span>
		</div>
		<div class="logo-ish">
			<div class="suitcases icon-cases">
				<!-- DnG baby -->
			</div>
			<a class="navbar-brand js-site-nav" href="<?php echo esc_url(home_url('/')); ?>">
				<div class="icon-t  logo">
					<!-- logooooo -->
				</div>
				<div class="banner__titles">
					<?php bloginfo('name'); ?>
					<?php dynamic_sidebar('sidebar-subtitle'); ?>					
				</div>
			</a>
			
		</div>
		
	</div>

</header>
