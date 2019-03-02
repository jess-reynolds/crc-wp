

<div class="nav__bar--wrap">
	<div class="nav__bar">
		<?php wp_nav_menu(array( 'theme_location' => 'header-menu', 'container' => false, 'menu_class' => 'nav__container' )); ?>
		<div class="menu-item">
			<div>
				<a href="/login">Sign in</a>
			</div>
		</div>
	</div>
	<div class="nav__bar--mobile">
		<div class="menu-item">
			<a href="/">
				<img title="Home" src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon-club.png" />
			</a>
		</div>
		<div class="menu-item" onclick="hamburgerClick()">
			<i class="fa fa-bars"></i>
		</div>
	</div>
</div>