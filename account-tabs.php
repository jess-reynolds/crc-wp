<?php
/*
Plugin Name: MemberPress Account Page Nav
Plugin URI: http://www.memberpress.com/
Description: Allows developers to add more nav menu links/pages to their members account page
Version: 1.0.0
Author: Caseproof, LLC
Author URI: http://caseproof.com/
Copyright: 2004-2013, Caseproof, LLC
*/
//COPY FROM THE LINE BELOW TO THE END, IF YOU PLAN TO PASTE THIS CODE INTO A THEME'S functions.php FILE OR INTO A PLUGIN LIKE My Custom Functions
//ADD A SUPPORT TAB TO THE NAV MENU
function mepr_add_some_tabs($user)
{
    $support_active = (isset($_GET['action']) && $_GET['action'] == 'membership-cards')?'mepr-active-nav-tab':''; ?>
<span
    class="mepr-nav-item membership-cards <?php echo $support_active; ?>">
    <a
        href="<?php echo MeprOptions::fetch()->account_page_url(); ?>?action=membership-cards">Membership
        cards</a>
</span>
<?php
}
add_action('mepr_account_nav', 'mepr_add_some_tabs');
//YOU CAN DELETE EVERYTHING BELOW THIS LINE -- IF YOU PLAN TO REDIRECT
//THE USER TO A DIFFERENT PAGE INSTEAD OF KEEPING THEM ON THE SAME PAGE
//ADD THE CONTENT FOR THE NEW SUPPORT TAB ABOVE
function mepr_add_tabs_content($action)
{
    if ($action == 'membership-cards'):
        $user = MeprUtils::get_currentuserinfo();
    $active_products = $user->active_product_subscriptions('transactions');

    if (sizeof($active_products) == 0) {
        echo "You don't have any active memberships!";
    }

    foreach ($active_products as $sub):
    $my_img = imagecreatefrompng(get_template_directory() . "/assets/images/membership-card.png");
    imageAlphaBlending($my_img, true);
    imageSaveAlpha($my_img, true);

    $height = imagesy($my_img);
    $width = imagesx($my_img);

    $black = imagecolorallocate($my_img, 0, 0, 0);

    $font = get_template_directory() . "/assets/fonts/VT323-Regular.ttf";

    imagettftext($my_img, 50, 0, 140, 500, $black, $font, strtoupper($user->get_full_name()));
    imagettftext($my_img, 35, 0, 130, 715, $black, $font, date("j F Y", strtotime($sub->expires_at)));

    ob_start();
    imagepng($my_img);
    $image_data = ob_get_contents();
    ob_end_clean();
    $image_data_base64 = base64_encode($image_data);
            
    imagecolordeallocate($my_img, $black);
    imagedestroy($my_img); ?>

<img class="account__membership-card"
    src="data:image/png;base64,<?php echo $image_data_base64 ?>" />

<?php
    endforeach;
    endif;
}
    add_action('mepr_account_nav_content', 'mepr_add_tabs_content');
