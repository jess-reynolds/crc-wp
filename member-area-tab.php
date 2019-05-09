<?php

function mepr_add_member_area_tab($user)
{
    $support_active = (isset($_GET['action']) && $_GET['action'] == 'member-area')?'mepr-active-nav-tab':''; ?>
<span
    class="mepr-nav-item member-area <?php echo $support_active; ?>">
    <a
        href="<?php echo MeprOptions::fetch()->account_page_url(); ?>?action=member-area">Members'
        area</a>
</span>
<?php
}

function mepr_add_member_area_content($action)
{
    if ($action == 'member-area'):
        $query = new WP_Query(array( 'page_id' => get_option('members_area_page_id') ));
    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post(); ?>
<div class="members_area">
    <?php the_content(); ?>
</div>
<?php
    endwhile;
    wp_reset_postdata();
    endif;
    endif;
}

add_action('mepr_account_nav', 'mepr_add_member_area_tab');
add_action('mepr_account_nav_content', 'mepr_add_member_area_content');
