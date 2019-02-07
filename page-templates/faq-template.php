<?php
/**
 * Template Name: Q&A template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

get_header(); if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="faq__head--hill"></div>
<img class="faq__head--bike" src="http://condors1.local/wp-content/themes/crc-wp/assets/images/bike.png" />
<section class="faq__head--container">
    <div class="faq__head--header">
        <div class="grid-x nav__bar">
            <div class="cell auto">
                <div class="grid-x">
                    <div class="cell shrink nav__link"><a href="/"><img title="Home" src="<?php bloginfo('template_url'); ?>/assets/images/icon-club.png" /></a></div>
                    <div class="cell shrink nav__link"><a href="/newcomers">Newcomers</a></div>
                    <div class="cell shrink nav__link"><a href="/club">Club</a></div>
                    <div class="cell shrink nav__link"><a href="/rides">Rides</a></div>
                    <div class="cell shrink nav__link"><a href="/racing">Racing</a></div>
                    <div class="cell shrink nav__link"><a href="/shop">Shop</a></div>
                </div>
            </div>
            <div class="cell small-3 nav__link">
                <div style="text-align: right">
                    <a href="/login">Sign in</a>
                </div>
            </div>
        </div>
    </div>
    <div class="faq__head--text">
        <h1>Your first ride</h1>
    </div>
</section>

<div class="grid-container">
    <div class="grid-x">
        <div class="cell faq__intro">
            <p><?php echo get_post_meta($post->ID, "faq_intro", true); ?>
            </p>
            <img title="Home" src="<?php bloginfo('template_url'); ?>/assets/images/icon-club.png" />
        </div>

    </div>
</div>

<div class="faq__question--wrap">

    <?php
    $questions = get_post_meta($post->ID, "faq_faq", true);
    $even = false;
    foreach ((array) $questions as $key => $entry) {
        $even = !$even;
        $question = $answer = '';
        if (isset($entry['question'])) {
            $question = esc_html($entry['question']);
        }
        
        if (isset($entry['answer'])) {
            $answer = esc_html($entry['answer']);
        } ?>
    <div class="faq__question--container--large">
        <div class="faq__question--container">
            <div class="grid-x">
                <div class="cell small-2">
                    <?php
                    if ($even && isset($entry['image'])) {
                        echo '<img src="'.$entry['image'].'">';
                    } ?>
                </div>
                <div class="cell small-1"></div>
                <?php
                    if (!$even) {
                        echo '<div class="cell small-1"></div>';
                    } ?>
                <div class="cell small-5">
                    <h2>
                        <?php echo $question; ?>
                    </h2>
                    <?php echo wpautop($answer); ?>
                </div>
                <div class="cell small-1"></div>
                <div class="cell small-2">
                    <?php
                    if (!$even && isset($entry['image'])) {
                        echo '<img src="'.$entry['image'].'">';
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="faq__question--container--small">
        <div class="faq__question--container">
            <h2>
                <?php echo $question; ?>
            </h2>
            <?php echo wpautop($answer); ?>
            <?php
                    if (isset($entry['image']) && $entry['image'] != '') {
                        echo '<div class="faq__question--image"><img src="'.$entry['image'].'"></div>';
                    } ?>
        </div>
    </div>

    <?php
    } ?>
</div>


<?php endwhile; endif; get_footer();