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

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="header--image">
	<img class="archive__header--image"
		src="<?php the_post_thumbnail_url(null, "full") ?>" />
</div>

<div class="header--text2">
	<h1>
		<?php the_title(); ?>
	</h1>
	<p>
		<?php the_date(); ?>
	</p>
</div>

<div class="single__content">
	<?php the_content(); ?>
</div>

<?php endwhile; endif; get_footer();
