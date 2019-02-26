<?php
/**
 * Template Name: Plans template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */


get_header(); if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php


$mepr_options = MeprOptions::fetch();
echo $mepr_options->currency_symbol;

$args = array( 'post_type' => 'memberpressproduct');
$myposts = get_posts($args);
foreach ($myposts as $post) : setup_postdata($post); ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<li>£<?php echo $post->_mepr_product_price ?>
</li>
<?php endforeach; wp_reset_postdata(); ?>

<?php endwhile; endif; get_footer();
