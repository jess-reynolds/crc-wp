<div class="nav__bar--wrap">
	<div class="nav__bar">
		<div class="nav__container">
			<div class="menu-item">
				<a href="<?php echo get_home_url() ?>">
					<img title="Home"
						src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon-club.png" />
				</a>
			</div>
			<?php wp_nav_menu(array('theme_location' => 'header-menu', 'items_wrap'=> '%3$s', 'container' => false, 'menu_class' => 'nav__container')); ?>
		</div>
		<div class="menu-item">
			<div>
				<?php
                if (is_user_logged_in()) {
                    ?>
				<a
					href="<?php echo MeprOptions::fetch()->account_page_url(); ?>">Account</a>
				<?php
                } else {
                    ?>
				<a href="/login">Sign in</a> <?php
                }
                ?>
			</div>
		</div>
	</div>
	<div class="nav__bar--mobile">
		<div class="menu-item">
			<a href="/">
				<img title="Home"
					src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon-club.png" />
			</a>
		</div>
		<div class="menu-item" onclick="hamburgerClick()">
			<i class="fa fa-bars"></i>
		</div>
	</div>
</div>