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

<section class="boxes__hero--container" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)), url('<?php echo get_post_meta($post->ID, "join_hero", true); ?>')">
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

<div class="layout__gap"></div>

<div class="layout__thin">
    <div>
        <div class="home__heading">
            <?php echo get_post_meta($post->ID, "join_headline", true); ?>
        </div>

        <div class="cell boxes__intro">
            <p><?php echo get_post_meta($post->ID, "join_intro", true); ?>
            </p>
        </div>
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
