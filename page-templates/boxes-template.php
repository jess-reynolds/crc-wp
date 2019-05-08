<?php
/**
 * Template Name: Boxes template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

get_header(); if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="header--container">
    <div class="header--header">
        <?php get_template_part('parts/nav', 'topbar'); ?>
    </div>
</section>

<div class="header--image">
    <img
        src="<?php echo get_post_meta($post->ID, "boxes_hero", true); ?>">
</div>

<div class="header--text">
    <h1>
        <?php the_title(); ?>
    </h1>
</div>



<div class="layout__thin">

    <div class="cell boxes__intro">
        <p class="prose"><?php echo get_post_meta($post->ID, "boxes_intro", true); ?>
        </p>
        <img title="Home"
            src="<?php bloginfo('template_url'); ?>/assets/images/icon-club.png" />
    </div>

    <div class="boxes__wrap">
        <div class="boxes__container">
            <?php
    $questions = get_post_meta($post->ID, "boxes_boxes", true);
    foreach ((array) $questions as $key => $entry) {
        if (isset($entry['link'])) {
            $link = get_permalink($entry['link'][0]);
        } else {
            $link = get_permalink($entry['link_external']);
        } ?>

            <div class="boxes__box--container">
                <a href="<?php echo $link ?>">
                    <img class="boxes__box--image"
                        src="<?php echo $entry['image'] ?>" />
                </a>

                <div class="boxes__box--title">
                    <h3>
                        <a class="boxes__box--title-a"
                            href="<?php echo $link ?>">
                            <?php echo $entry['title'] ?>
                        </a>
                    </h3>
                </div>

                <div class="boxes__box--text">
                    <p>
                        <?php echo $entry['blurb'] ?>
                    </p>
                </div>
                <a class="boxes__box--link link"
                    href="<?php echo $link ?>">Read
                    more</a>

            </div>
            <?php
    } ?>

        </div>
    </div>
</div>

<?php endwhile; endif; get_template_part('parts/content', 'join'); get_footer();
