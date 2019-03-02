<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

<section class="boxes__hero--container plans__hero">
	<div class="boxes__hero--header">
		<?php get_template_part('parts/nav', 'topbar'); ?>
	</div>
	<div class="boxes__hero--inside">
		<div class="boxes__hero--text">
			<h1>
				<?php the_title() ?>
			</h1>
		</div>
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
