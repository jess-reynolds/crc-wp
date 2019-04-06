<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

$user = MeprUtils::get_currentuserinfo();

if ($user !== false && isset($user->ID)) {
    //Returns an array of Membership ID's that the current user is active on
    //Can also use 'products' or 'transactions' as the argument type

    $active_products = $user->active_product_subscriptions('transactions');
    
    if (!empty($active_products)) {
        $sub = $active_products[0];
        
        $my_img = imagecreate(1200, 900);
        $background = imagecolorallocate($my_img, 0, 0, 255);
        $text_colour = imagecolorallocate($my_img, 255, 255, 0);
        $line_colour = imagecolorallocate($my_img, 128, 255, 0);
        imagestring($my_img, 4, 30, 25, $user->get_full_name(), $text_colour);
        imagestring($my_img, 4, 30, 50, "Expires ". $sub->expires_at, $text_colour);
        imagesetthickness($my_img, 5);
        imageline($my_img, 30, 90, 165, 90, $line_colour);

        header("Content-type: image/png");
        imagepng($my_img);
        imagecolordeallocate($my_img, $line_color);
        imagecolordeallocate($my_img, $text_color);
        imagecolordeallocate($my_img, $background);
        imagedestroy($my_img);
    }
}
