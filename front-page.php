<?php
/**
 * Template Name: Front Page Template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */
 
get_header(); ?>

<section class="home__hero--container" style="linear-gradient(rgba(232, 110, 178, 0.72), rgba(100, 35, 109, 0.72)), linear-gradient(rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.25)), url('<?php bloginfo('template_url'); ?>/assets/images/main.jpg');">
	<div class="home__hero--header">
		<div class="grid-x nav__bar">
			<div class="cell auto">
				<div class="grid-x">
					<div class="cell shrink nav__link"><a href="/"><img title="Home" src="<?php bloginfo('template_url'); ?>/assets/images/icon-club.png" /></a></div>
					<div class="cell shrink nav__link"><a href="/newcomers">Newcomers</a></div>
					<div class="cell shrink nav__link"><a href="/club">Club</a></div>
					<div class="cell shrink nav__link"><a href="/rides">Rides</a></div>
					<div class="cell shrink nav__link"><a href="/racing">Racing</a></div>
					<div class="cell shrink nav__link"><a href="/shop">Shop</a></div>
				</div>
			</div>
			<div class="cell small-2 nav__link">
				<div style="text-align: right">
					<a href="/login">Sign in</a>
				</div>
			</div>
		</div>
	</div>
	<div class="home__hero--inside">
		<div class="home__hero--text">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/icon-club.png" />
			<h1>condors</h1>
		</div>
	</div>

</section>

<div class="home__heading">
	We like riding bicycles.
</div>

<div class="grid-container">
	<div class="cell home__intro">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
		<a type="button" class="button red button__ride" href="/membership">Ride with us</a>
	</div>
</div>



<section class="home__banner--container" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)),
        url('<?php bloginfo('template_url'); ?>/assets/images/rides.jpg');">
	<div class="home__banner--inside">
		<div class="home__banner--text">
			<h1>Rides</h1>
			<p>During Spring and Summer there are regular club rides to suit any rider every Tuesday, Thursday and on weekends.</p>
			<a href="/rides">Read more</a>
		</div>
	</div>
</section>

<section class="home__banner--container" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)),
        url('<?php bloginfo('template_url'); ?>/assets/images/racing.jpg');">
	<div class="home__banner--inside">
		<div class="home__banner--text">
			<h1>Racing</h1>
			<p>We have thriving men's and women's race teams and are always glad to assist new racers.</p>
			<a href="/racing">Read more</a>
		</div>
	</div>
</section>

<section class="home__banner--container" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)),
        url('<?php bloginfo('template_url'); ?>/assets/images/shop.jpg');">
	<div class="home__banner--inside">
		<div class="home__banner--text">
			<h1>Shop</h1>
			<p>We have thriving men's and women's race teams and are always glad to assist new racers.</p>
			<a href="/racing">Read more</a>
		</div>
	</div>
</section>


<?php get_footer();
