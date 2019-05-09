<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

<section class="header--container plans__hero">
	<div class="header--header">
		<?php get_template_part('parts/nav', 'topbar'); ?>
	</div>
	<div class="header--inside">
		<h1>
			<?php the_title() ?>
		</h1>
	</div>
</section>
<div class="layout__contents">
	<div class="layout__thin">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php get_template_part('parts/loop', 'page'); ?>

		<?php endwhile; endif; ?>

	</div>
</div>

<?php get_footer();
