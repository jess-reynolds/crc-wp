<?php
/**
 * Template Name: Routes template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

get_header(); if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="faq__head--wrap">
    <div class="faq__head--hill">
        <img class="faq__head--bike"
            src="<?php bloginfo('template_url'); ?>/assets/images/bike.png" />
    </div>

</div>

<section class="header--container faq__head--container">
    <div class="header--header">
        <?php get_template_part('parts/nav', 'topbar'); ?>
    </div>
    <div class="header--inside">
        <div class="header--text">
            <h1>
                <?php the_title(); ?>
            </h1>
        </div>
    </div>
</section>

<div class="layout__thin">
    <div class="faq__intro">
        <p class="prose">
            <?php echo get_post_meta($post->ID, "people_intro", true); ?>
        </p>
        <img title="Home"
            src="<?php bloginfo('template_url'); ?>/assets/images/icon-club.png" />
    </div>
</div>

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
                <?php if (isset($entry['strava'])): ?>
                <li>
                    <a href=<?php echo $entry['strava'] ?>>Strava</a>
                </li>
                <?php endif; if (isset($entry['gpx'])): ?>
                <li>
                    <a href=<?php echo $entry['gpx'] ?>>GPX</a>
                </li>
                <?php endif; if (isset($entry['tcx'])): ?>
                <li>
                    <a href=<?php echo $entry['tcx'] ?>>TCX</a>
                </li>
                <?php endif; if (isset($entry['pdf'])): ?>
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


<?php endwhile; endif; get_footer();
