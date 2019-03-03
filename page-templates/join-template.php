<?php
/**
 * Template Name: Join template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */


get_header(); if (have_posts()) : while (have_posts()) : the_post();
?>

<section class="header--container plans__hero">
    <div class="header--header">
        <?php get_template_part('parts/nav', 'topbar'); ?>
    </div>
    <div class="header--inside">
        <div class="header--text">
            <h1>
                <?php echo get_post_meta($post->ID, "join_heading", true); ?>
            </h1>
        </div>
    </div>
</section>


<div class="join__collage">
    <img class="join__collage--image join__collage--image-1" src="<?php echo get_post_meta($post->ID, "join_collage1", true); ?>" />
    <img class="join__collage--image join__collage--image-2" src="<?php echo get_post_meta($post->ID, "join_collage2", true); ?>" />
    <img class="join__collage--image join__collage--image-3" src="<?php echo get_post_meta($post->ID, "join_collage3", true); ?>" />
    <img class="join__collage--image join__collage--image-4" src="<?php echo get_post_meta($post->ID, "join_collage4", true); ?>" />
    <img class="join__collage--image join__collage--image-5" src="<?php echo get_post_meta($post->ID, "join_collage5", true); ?>" />
    <img class="join__collage--image join__collage--image-6" src="<?php echo get_post_meta($post->ID, "join_collage6", true); ?>" />
    <img class="join__collage--image join__collage--image-7" src="<?php echo get_post_meta($post->ID, "join_collage7", true); ?>" />
    <img class="join__collage--image join__collage--image-8" src="<?php echo get_post_meta($post->ID, "join_collage8", true); ?>" />
</div>


<div class="layout__thin">
    <div class="join__intro">
        <p>
            <?php echo get_post_meta($post->ID, "join_intro", true); ?>
        </p>
    </div>
</div>

<?php

$group = new MeprGroup(get_post_meta($post->ID, "join_group", true));
$products = $group->products();

?>
<div class="plans__wrap">
    <div class="plans__container">

        <?php

foreach ($products as $product) {
    ?>
        <div class="plans__item">
            <img class="plans__icon" title="Home" src="<?php bloginfo('template_url'); ?>/assets/images/icon-club.png" />
            <?php MeprGroupsHelper::group_page_item($product, $group); ?>
        </div>
        <?php
} ?>
    </div>
</div>

<?php endwhile; endif; get_footer();
