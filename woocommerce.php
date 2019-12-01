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
    <?php woocommerce_content(); ?>
</div>

<?php get_footer();
