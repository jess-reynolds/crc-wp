<?php
/**
 * Template Name: Boxes template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

get_header(); if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="header--container"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)), url('<?php echo get_post_meta($post->ID, "boxes_hero", true); ?>')">
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
        ?>

            <div class="boxes__box--container">
                <a
                    href="<?php echo $entry['link']?>">
                    <img class="boxes__box--image"
                        src="<?php echo $entry['image'] ?>" />
                </a>

                <div class="boxes__box--title">
                    <h3>
                        <a class="boxes__box--title-a"
                            href="<?php echo $entry['link']?>">
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
                    href="<?php echo $entry['link']?>">Read
                    more</a>

            </div>
            <?php
    } ?>

        </div>
    </div>
</div>


<div class="join__wrap">
    <p>
        Become a member or supporter today!
    </p>
    <a type="button" class="button red button__ride"
        href="<?php echo get_post_meta($post->ID, "home_action_link", true); ?>">
        Join the Condors
    </a>
</div>


<?php endwhile; endif; get_footer();
