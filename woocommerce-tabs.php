<?php

global $post;

function mepr_add_woocommerce_tab($user)
{
    $orders_active = (isset($_GET['action']) && $_GET['action'] == 'orders')?'mepr-active-nav-tab':'';
    $addresses_active = (isset($_GET['action']) && $_GET['action'] == 'addresses')?'mepr-active-nav-tab':'';
    $methods_active = (isset($_GET['action']) && $_GET['action'] == 'methods')?'mepr-active-nav-tab':''; ?>

<span class="mepr-nav-item orders <?php echo $orders_active; ?>">
    <a
        href="<?php echo MeprOptions::fetch()->account_page_url(); ?>?action=orders">Orders</a>
</span>
<span class="mepr-nav-item orders <?php echo $addresses_active; ?>">
    <a
        href="<?php echo MeprOptions::fetch()->account_page_url(); ?>?action=addresses">Addresses</a>
</span>
<span class="mepr-nav-item orders <?php echo $methods_active; ?>">
    <a
        href="<?php echo MeprOptions::fetch()->account_page_url(); ?>?action=methods">Payment
        methods</a>
</span>
<?php
}

function mepr_add_woocommerce_content($action)
{
    if ($action == 'orders') {
        require_once(WP_PLUGIN_DIR . "/woocommerce/templates/myaccount/orders.php");
    } elseif ($action == 'addresses') {
        require_once(WP_PLUGIN_DIR . "/woocommerce/templates/myaccount/my-address.php");
    } elseif ($action == 'methods') {
        require_once(WP_PLUGIN_DIR . "/woocommerce/templates/myaccount/payment-methods.php");
    }
}

add_action('mepr_account_nav', 'mepr_add_woocommerce_tab');
add_action('mepr_account_nav_content', 'mepr_add_woocommerce_content');
