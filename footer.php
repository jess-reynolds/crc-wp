<?php
/**
 * The template for displaying the footer.
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
 ?>

<footer class="footer" role="contentinfo">
	<div class="footer__inside">
		<p class="footer__copyright">&copy;
			<?php echo date('Y') ?>
			<?php bloginfo('name') ?>.
		</p>

		<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'items_wrap'=> '%3$s', 'container' => false)) ?>

		<?php wp_nav_menu(array('theme_location' => 'social-menu', 'container' => false, 'menu_class' => 'footer__social')) ?>
	</div>
</footer>

</div>

</div>

<?php wp_footer(); ?>

</body>

</html>