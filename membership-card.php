<?php

$user = MeprUtils::get_currentuserinfo();

if ($user !== false && isset($user->ID)) {
    $active_products = $user->active_product_subscriptions('transactions');

    if (!empty($active_products)) {
        $sub = $active_products[0];

        $my_img = imagecreatefrompng(get_template_directory() . "/assets/images/membership-card.png");
        $height = imagesy($my_img);
        $width = imagesx($my_img);

        $black = imagecolorallocate($my_img, 0, 0, 0);

        $font = get_template_directory() . "/assets/fonts/opensans-regular.ttf";

        imagestring($my_img, 5, 450, 300, $user->get_full_name(), $black);
        imagestring($my_img, 5, 450, 320, $sub->expires_at, $black);

        //imagettftext($my_img, 50, 0, 350, 320, $black, $font, $user->first_name);
        //imagettftext($my_img, 50, 0, 250, 420, $black, $font, $sub->expires_at);

        header("Content-type: image/png");
        imagepng($my_img);
        imagecolordeallocate($my_img, $black);
        imagedestroy($my_img);
    }
}
