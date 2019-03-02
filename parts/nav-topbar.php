<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/responsive-navigation/
 */
?>

<div class="nav__bar">
	<?php wp_nav_menu(array( 'theme_location' => 'header-menu', 'container' => false, 'menu_class' => 'nav__container' )); ?>
	<div class="menu-item">
		<div>
			<a href="/login">Sign in</a>
		</div>
	</div>
</div>