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

	<div class="grid-x">

		<div class="cell auto">
			<div class="grid-x">
				<div class="cell shrink">
					<p class="source-org copyright">&copy; <?php echo date('Y'); ?>
						<?php bloginfo('name'); ?>.</p>
				</div>
				<div class="cell footer__link shrink"><a href="/newcomers">Contact us</a></div>
				<div class="cell footer__link shrink"><a href="/club">Events</a></div>
				<div class="cell footer__link shrink"><a href="/rides">Club policies</a></div>

				<div class="cell footer__link auto"></div>

				<div class="cell footer__link shrink">
					<a title="Facebook" href="https://www.facebook.com/groups/cowleyroadcondors/">
						<i class="fab fa-facebook-f"></i>
					</a>
				</div>
				<div class="cell footer__link shrink">
					<a title="Twitter" href="https://twitter.com/crcondors">
						<i class="fab fa-twitter"></i>
					</a>
				</div>
				<div class="cell footer__link shrink">
					<a title="Youtube" href="https://www.youtube.com/channel/UCNZUEgOSw6VoeWaYONXy5_w">
						<i class="fab fa-youtube"></i>
					</a>
				</div>
				<div class="cell footer__link shrink">
					<a title="Instagram" href="https://www.instagram.com/cowleyroadcondors/">
						<i class="fab fa-instagram"></i>
					</a>
				</div>
			</div>
		</div>
	</div>

</footer>

</div>

</div>

<?php wp_footer(); ?>

</body>

</html>