<?php
/**
 * Template Name: Archive template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */


get_header(); ?>

<section class="header--container">
    <div class="header--header">
        <?php get_template_part('parts/nav', 'topbar'); ?>
    </div>
</section>

<div>

    <?php

    $query = new WP_Query( array( 'post_type' => 'post',
    'post_status' => 'publish',
    'has_password' => false,
    'posts_per_page' => 24) );

    $first = true;

    // Start the Loop.
    while ($query->have_posts()) : $query->the_post();
    if ($first): ?>
    <div class="archive__header--container">
        <a href="<?php the_permalink() ?>">
            <img class="archive__header--image"
                src="<?php the_post_thumbnail_url(null, "full") ?>" />
        </a>

        <a href="<?php echo the_permalink() ?>">
            <h1 class="condensed">
                <?php the_title() ?>
            </h1>
        </a>

        <p class="archive__header--text">
            <?php echo esc_html(get_the_excerpt()) ?>
        </p>
        <div class="archive__header--link">
            <a class="link" href="<?php echo the_permalink() ?>">Read
                more</a>
        </div>
    </div>

</div>

<div class="boxes__wrap">
    <div class="boxes__container">
        <?php
        else:
            get_template_part('parts/page', 'box');
        endif;
        $first = false;
        endwhile; ?>
    </div>
</div>
</div>

<?php

wp_enqueue_script('jquery');
wp_register_script('load-more', get_template_directory_uri() . '/load-more.js', array('jquery'));

wp_localize_script('load-more', 'params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
    'posts' => json_encode($query->query_vars),
    'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
    'max_page' => $query->max_num_pages
));

wp_enqueue_script('load-more');

get_template_part('parts/content', 'join');

get_footer();
