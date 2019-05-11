<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">

	<!-- Force IE to use the latest rendering engine available -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta class="foundation-mq">

	<!-- If Site Icon isn't set in customizer -->
	<?php if (! function_exists('has_site_icon') || ! has_site_icon()) {
    ?>
	<!-- Icons & Favicons -->
	<link rel="icon"
		href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link
		href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png"
		rel="apple-touch-icon" />
	<?php
} ?>

	<link rel="pingback"
		href="<?php bloginfo('pingback_url'); ?>">

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
		integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<?php wp_head(); ?>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var elem = document.getElementsByClassName("nav__offcanvas--wrap")[0];
			elem.style.display = "block";

			document.documentElement.style.setProperty(
				"--offcanvas-height",
				"-" + elem.clientHeight + "px"
			);
		});

		window.addEventListener('resize', function() {
			var elem = document.getElementsByClassName("nav__offcanvas--wrap")[0];
			elem.style.display = "block";

			document.documentElement.style.setProperty(
				"--offcanvas-height",
				"-" + elem.clientHeight + "px"
			);
		});

		function hamburgerClick() {
			var elem = document.getElementsByClassName("layout__wrap")[0];
			if (elem.classList.contains("slide-in")) {
				elem.classList.add("slide-out")
				elem.classList.remove("slide-in")
			} else {
				elem.classList.add("slide-in")
				elem.classList.remove("slide-out")
			}
		}
	</script>

</head>

<body <?php body_class(); ?>>
	<div class="layout__wrap">
		<div class="nav__offcanvas--wrap">
			<div class="nav__offcanvas--container">
				<?php wp_nav_menu(array( 'theme_location' => 'header-menu', 'container' => false, 'menu_class' => 'nav__offcanvas' )); ?>

				<div class="nav__offcanvas--item">
					<a
						href="<?php echo WC()->cart->get_cart_url() ?>">
						Basket (<?php echo WC()->cart->get_cart_contents_count(); ?>)
					</a>
				</div>

				<div class="nav__offcanvas--item">
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
				<div class="nav__offcanvas--close" onclick="hamburgerClick()">
					<i class="fa fa-times"></i>
				</div>
			</div>
		</div>
		<div class="layout__container">