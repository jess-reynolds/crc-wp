<?php
/**
 * Template part for displaying a single post
 */
?>

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