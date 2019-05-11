<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

<section class="header--container plans__hero">
	<div class="header--header">
		<?php get_template_part('parts/nav', 'topbar'); ?>
	</div>
</section>

<div class="single__wrap">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<img class="archive__header--image"
		src="<?php the_post_thumbnail_url(null, "full") ?>" />

	<h1 class="condensed">
		<?php the_title(); ?>
	</h1>
	<p class="single__date">
		<?php the_date(); ?>
	</p>

	<div class="single__content layout__thin no-pad">
		<?php the_content(); ?>
	</div>
</div>

<?php endwhile; endif; get_footer();
