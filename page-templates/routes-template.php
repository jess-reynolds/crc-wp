<?php
/**
 * Template Name: Routes template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

get_header(); if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="header--container faq__head--container">
    <div class="header--header">
        <?php get_template_part('parts/nav', 'topbar'); ?>
    </div>
</section>

<div class="header--image">
    <img
        src="<?php echo get_post_meta($post->ID, "routes_hero", true); ?>">
    <h1>
        <?php the_title(); ?>
    </h1>
</div>

<div class="layout__thin">
    <div class="faq__intro">
        <p>
            <?php echo get_post_meta($post->ID, "routes_intro", true); ?>
        </p>
    </div>
</div>
<div class="layout__thin no-pad">
    <div class="routes--wrap">

        <?php
        $routes = get_post_meta($post->ID, "routes_routes", true);
        foreach ((array) $routes as $key => $entry): ?>

        <div class="routes--container">
            <div class="routes--body">
                <h3>
                    <?php echo $entry['name'] ?>
                </h3>
                <ul class="routes__files">
                    <?php if ($entry['strava'] != ""): ?>
                    <li>
                        <a href=<?php echo $entry['strava'] ?>>Strava</a>
                    </li>
                    <?php endif; if ($entry['gpx'] != ""): ?>
                    <li>
                        <a href=<?php echo $entry['gpx'] ?>>GPX</a>
                    </li>
                    <?php endif; if ($entry['tcx'] != ""): ?>
                    <li>
                        <a href=<?php echo $entry['tcx'] ?>>TCX</a>
                    </li>
                    <?php endif; if ($entry['pdf'] != ""): ?>
                    <li>
                        <a href=<?php echo $entry['pdf'] ?>>Route
                            sheet</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <p>
                    <?php echo $entry['description'] ?>
                </p>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>


<?php endwhile; endif; get_template_part('parts/content', 'join'); get_footer();
