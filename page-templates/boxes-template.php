<?php
/**
 * Template Name: Boxes template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

get_header(); if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="boxes__hero--container" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)), url('<?php echo get_post_meta($post->ID, "boxes_hero", true); ?>')">
    <div class="boxes__hero--header">
        <div class="nav__bar">
            <?php wp_nav_menu(array( 'theme_location' => 'header-menu', 'container' => false, 'menu_class' => 'nav__container' )); ?>
            <div class="menu-item">
                <div>
                    <a href="/login">Sign in</a>
                </div>
            </div>
        </div>
    </div>
    <div class="boxes__hero--inside">
        <div class="boxes__hero--text">
            <h1>
                <?php the_title(); ?>
            </h1>
        </div>
    </div>
</section>

<div class="grid-container">
    <div class="grid-x">
        <div class="home__heading">
            <?php echo get_post_meta($post->ID, "boxes_headline", true); ?>
        </div>

        <div class="cell boxes__intro">
            <p><?php echo get_post_meta($post->ID, "boxes_intro", true); ?>
            </p>
            <img title="Home" src="<?php bloginfo('template_url'); ?>/assets/images/icon-club.png" />
        </div>

    </div>
</div>

<div class="boxes__wrap">
    <?php
    $questions = get_post_meta($post->ID, "boxes_boxes", true);
    foreach ((array) $questions as $key => $entry) {
        ?>

    <div class="boxes__box--container">
        <img class="boxes__box--image" src="<?php echo $entry['image'] ?>" />
        <div class="boxes__box--lower">
            <div class="boxes__box--title"><?php echo $entry['title'] ?>
            </div>
            <div class="boxes__box--text"><?php echo $entry['blurb'] ?>
            </div>
            <a class="boxes__box--link" href="<?php echo $entry['link']?>">Read
                more</a>
        </div>
    </div>
    <?php
    } ?>

</div>


<?php endwhile; endif; get_footer();
