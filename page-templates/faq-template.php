<?php
/**
 * Template Name: FAQ template
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

get_header(); if (have_posts()) : while (have_posts()) : the_post(); ?>

<script>
    function faq_click(event) {
        var block = event.target.closest(".faq__question--container");
        var answer = block.children[1];
        var icon = block.children[0].children[1];

        if (getComputedStyle(answer, null).display == "none") {
            answer.style.display = "block";
            icon.innerHTML = "";
        } else {
            answer.style.display = "none";
            icon.innerHTML = "+";
        }
    }

    function faq_expand() {
        var blocks = document.getElementsByClassName("faq__question--container");
        for (var i = 0; i < blocks.length; i++) {
            blocks[i].children[1].style.display = "block";
            var icon = blocks[i].children[0].children[1].innerHTML = "";
        }
    }
</script>

<section class="header--container faq__head--container">
    <div class="header--header">
        <?php get_template_part('parts/nav', 'topbar'); ?>
    </div>
</section>

<div class="header--image">
    <img
        src="<?php echo get_post_meta($post->ID, "faq_image", true); ?>">
    <h1>
        <?php the_title(); ?>
    </h1>
</div>

<div class="layout__thin">
    <div class="faq__intro">
        <p>
            <?php echo get_post_meta($post->ID, "faq_intro", true); ?>
        </p>
    </div>
</div>
<div class="layout__thin no-pad">
    <div class="faq__question--wrap">
        <div class="faq__expand" onclick="faq_expand()">
            <span>Expand all</span>
        </div>

        <?php
    $questions = get_post_meta($post->ID, "faq_faq", true);
    foreach ((array) $questions as $key => $entry): ?>
        <div class="faq__question--container">
            <div class="faq__question--q" onclick="faq_click(event)">
                <h3>
                    <?php echo $entry['question']; ?>
                </h3>
                <span class="icon">+</span>
            </div>
            <div class="faq__question--a">
                <p>
                    <?php echo $entry['answer']; ?>
                </p>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>


<?php endwhile; endif; get_template_part('parts/content', 'join'); get_footer();
