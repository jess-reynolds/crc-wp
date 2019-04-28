<?php
/**
 * The template for displaying the footer.
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

global $hide_join;

 if (!$hide_join):
 ?>

<div class="footer__join">
	<h3>
		Become a member or supporter today!
	</h3>
	<a type="button" class="button red button__ride" href="/join">
		Join the Condors &nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right"></i>
	</a>
</div>

<?php endif; ?>

<div class="footer__wrap">
	<footer class="footer" role="contentinfo">

		<div class="footer__sponsors">
			<?php
    $sponsors_post = new WP_Query(array('post_type' => 'sponsor'));
    if ($sponsors_post->have_posts()): while ($sponsors_post->have_posts()): $sponsors_post->the_post();
    
    $sponsors = get_post_meta($post->ID, 'sponsors_sponsors', true);
    foreach ((array) $sponsors as $key => $sponsor):
    ?>

			<a
				href="<?php echo $sponsor['url'] ?>">
				<img
					src="<?php echo $sponsor['image'] ?>">
			</a>

			<?php
        endforeach; endwhile; wp_reset_postdata(); endif;
    ?>
		</div>

		<div class="footer__inside">
			<p class="footer__copyright">&copy;
				<?php echo date('Y') ?>
				<?php bloginfo('name') ?>.
			</p>

			<div class="footer__links">
				<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'items_wrap'=> '%3$s', 'container' => false)) ?>
			</div>

			<?php wp_nav_menu(array('theme_location' => 'social-menu', 'container' => false, 'menu_class' => 'footer__social')) ?>
		</div>
	</footer>
</div>

</div>

</div>

<?php wp_footer(); ?>

</body>

</html>