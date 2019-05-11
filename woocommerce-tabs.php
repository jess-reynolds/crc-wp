<?php

global $post;

function mepr_add_woocommerce_tab($user)
{
    $active = (isset($_GET['action']) && $_GET['action'] == 'woocommerce')?'mepr-active-nav-tab':''; ?>

<span class="mepr-nav-item orders <?php echo $orders_active; ?>">
    <a
        href="<?php echo MeprOptions::fetch()->account_page_url(); ?>?action=woocommerce">Shop</a>
</span>
<?php
}

function mepr_add_woocommerce_content($action)
{
    if ($action == 'woocommerce') {
        wp_redirect(get_site_url(). '/my-account');
        exit();
    }
}

add_action('mepr_account_nav', 'mepr_add_woocommerce_tab');
add_action('mepr_account_nav_content', 'mepr_add_woocommerce_content');
