<?php
/**
 * Template Name: People template
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
        <p>
            <?php echo get_post_meta($post->ID, "people_intro", true); ?>
        </p>
    </div>
</div>

<div class="people__person--wrap">

    <?php
    $people = get_post_meta($post->ID, "people_people", true);
    foreach ((array) $people as $key => $entry): ?>


    <div class="people__person--container">
        <div class="people__person--image">
            <img
                src="<?php echo $entry['image'] ?>">
        </div>
        <div class="people__person--body">
            <h2>
                <?php echo $entry['p_name'] ?>
            </h2>
            <h3>
                <?php echo $entry['title'] ?>
            </h3>
            <a class="people__person--email"
                href="mailto:<?php echo $entry['email'] ?>">
                <?php echo $entry['email'] ?>
            </a>
            <p>
                <?php echo $entry['bio'] ?>
            </p>

        </div>
    </div>

    <?php endforeach; ?>
</div>


<?php endwhile; endif; get_template_part('parts/content', 'join'); get_footer();
