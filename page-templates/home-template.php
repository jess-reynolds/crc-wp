<?php
/**
 * Template Name: Home Template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */
 
get_header(); if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="header--container pink" style="background-image: linear-gradient(rgba(232, 110, 178, 0.72), rgba(100, 35, 109, 0.72)), linear-gradient(rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.25)), url('<?php echo get_post_meta($post->ID, "home_hero", true); ?>')">
	<div class="header--header">
		<?php get_template_part('parts/nav', 'topbar'); ?>
	</div>
	<div class="header--inside">
		<div class="header--text">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/icon-club.png" />
			<h1 class="home__logo">condors</h1>
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
		<p class="prose">
			<?php echo get_post_meta($post->ID, "home_intro", true); ?>
		</p>
		<a type="button" class="button red button__ride" href="<?php echo get_post_meta($post->ID, "home_action_link", true); ?>">
			<?php echo get_post_meta($post->ID, "home_action_title", true); ?>
		</a>
	</div>
</div>


<?php
    $banners = get_post_meta($post->ID, "home_banners", true);
    foreach ((array) $banners as $key => $entry) {
        $title = $blurb = $link = $image = '';
        if (isset($entry['title'])) {
            $title = esc_html($entry['title']);
        }
        
        if (isset($entry['blurb'])) {
            $blurb = esc_html($entry['blurb']);
        }

        if (isset($entry['link'])) {
            $link = esc_html($entry['link']);
        }
        
        if (isset($entry['image'])) {
            $image = esc_html($entry['image']);
        } ?>

<section class="home__banner--container" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)),
        url('<?php echo $image; ?>');">
	<div class="home__banner--inside">
		<div class="home__banner--text">
			<h1>
				<?php echo $title; ?>
			</h1>
			<p>
				<?php echo $blurb; ?>
			</p>
			<a class="link" href="<?php echo $link; ?>">Read more</a>
		</div>
	</div>
</section>

<?php
    } ?>

<?php endwhile; endif; get_footer();
