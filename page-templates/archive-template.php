<?php
/**
 * Template Name: Archive template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

get_header(); ?>

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

<div>
    <div class="boxes__wrap">
        <div class="boxes__container">
            <?php

    query_posts('post_type=post&showposts=30');
    $first = true;

    // Start the Loop.
    while (have_posts()) : the_post();
    if ($first): ?>
            <?php else: ?>
            <?php endif; ?>

            <div class="boxes__box--container">
                <a href="<?php the_permalink() ?>">
                    <img class="boxes__box--image"
                        src="<?php the_post_thumbnail_url(null, "full") ?>" />
                </a>

                <div class="boxes__box--title">
                    <h3>
                        <a class="boxes__box--title-a"
                            href="<?php echo the_permalink() ?>">
                            <?php the_title() ?>
                        </a>
                    </h3>
                </div>

                <div class=" boxes__box--text">
                    <p>
                        <?php echo esc_html(get_the_excerpt()) ?>
                    </p>
                </div>
                <a class="boxes__box--link link"
                    href="<?php echo the_permalink() ?>">Read
                    more</a>

            </div>

            <?php
        
        $first = false;
    
    endwhile; ?>

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






<?php get_footer();
