<div class="nav__bar--wrap">
	<div class="nav__bar">
		<div class="nav__container">
			<div class="menu-item">
				<a href="<?php echo get_home_url() ?>">
					<img title="Home"
						src="<?php echo get_bloginfo('template_url') ?>/assets/images/Condors_V2_WHITE.png" />
				</a>
			</div>
		</div>
		<div class="nav__container">
			<?php wp_nav_menu(array('theme_location' => 'header-menu', 'items_wrap'=> '%3$s', 'container' => false, 'menu_class' => 'nav__container')); ?>
		</div>
		<div class="menu-item">
			<a href="<?php echo WC()->cart->get_cart_url() ?>">
				Basket (<?php echo WC()->cart->get_cart_contents_count(); ?>)
			</a>
		</div>
		<div class="menu-item">
			<?php
                if (is_user_logged_in()) {
                    ?>
			<a
				href="<?php echo MeprOptions::fetch()->account_page_url(); ?>">My
				account</a>
			<?php
                } else {
                    ?>
			<a
				href="<?php echo MeprOptions::fetch()->login_page_url(); ?>">Sign
				in</a> <?php
                }
                ?>
		</div>
	</div>
	<div class="nav__bar--mobile">
		<div class="menu-item">
			<a href="<?php echo get_home_url() ?>">
				<img title="Home"
					src="<?php echo get_bloginfo('template_url') ?>/assets/images/Condors_V2_WHITE.png" />
			</a>
		</div>
		<div class="menu-item" onclick="hamburgerClick()">
			<i class="fa fa-bars"></i>
		</div>
	</div>
</div>