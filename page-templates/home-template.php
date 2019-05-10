<?php
/**
 * Template Name: Home Template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */
 
get_header(); if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="home--container pink"
	style="background-image: linear-gradient(rgba(255, 0, 0, 0.5), rgba(255, 64, 170, 0.72)), linear-gradient(rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.25)), url('<?php echo get_post_meta($post->ID, "home_hero", true); ?>')">
	<div class="home--header">
		<?php get_template_part('parts/nav', 'topbar'); ?>
	</div>
	<div class="home--inside">

		<!--
		<div class="home--text">
			<img
				src="<?php bloginfo('template_url'); ?>/assets/images/logo.png"
		/>
	</div>
	-->

	<div class="home--subtitle">
		<h3>Oxford's<br>friendliest<br>cycling club!</h3>
	</div>
	</div>
</section>

<div class="layout__thin">
	<div class="home__intro">
		<div class="home__heading">
			<h2>
				<?php echo get_post_meta($post->ID, "home_headline", true); ?>
			</h2>
		</div>
		<p>
			<?php echo get_post_meta($post->ID, "home_intro", true); ?>
		</p>
		<a type="button" class="button red button__ride"
			href="<?php echo get_permalink(get_post_meta($post->ID, "home_action_link", true)[0]); ?>">
			<?php echo get_post_meta($post->ID, "home_action_title", true); ?>
		</a>
	</div>
</div>


<?php
    $banners = get_post_meta($post->ID, "home_banners", true);
    foreach ((array) $banners as $key => $entry):
        $link = get_permalink($entry['link'][0]);
        ?>

<section class="home__banner--container">
	<div class="home__banner--image">
		<a href="<?php echo $link ?>">
			<img
				src="<?php echo $entry['image'] ?>">
		</a>
	</div>
	<div class="home__banner--inside">
		<h2>
			<?php echo $entry['title']; ?>
		</h2>
		<p>
			<?php echo $entry['blurb']; ?>
		</p>
		<a class="link" href="<?php echo $link ?>">Read
			more</a>
	</div>
</section>

<?php endforeach; endwhile; endif;
get_template_part('parts/content', 'join');
get_footer();

?>
<a href="<?php echo get_option('contact_url'); ?>"
	class="home__popper">
	<h4><i class="fas fa-comment"></i>&nbsp; Contact us!</h4>
</a>