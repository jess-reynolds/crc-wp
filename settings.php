<?php

function ktfu_settings_page()
{
    ?>
<div class="wrap">
    <h1>Settings</h1>
    <form method="post" action="options.php">
        <?php
            settings_fields("section");
    do_settings_sections('ktfu-settings');
    submit_button(); ?>
    </form>
</div>
<?php
}

function add_theme_menu_item()
{
    add_menu_page("KTFU", "KTFU", "manage_options", "ktfu-panel", "ktfu_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function display_join_url_element()
{
    ?>
<input type="text" name="join_url" id="join_url"
    value="<?php echo get_option('join_url'); ?>" />
<?php
}

function display_contact_url()
{
    ?>
<input type="text" name="contact_url" id="contact_url"
    value="<?php echo get_option('contact_url'); ?>" />
<?php
}

function display_members_area_page_id_element()
{
    ?>
<input type="text" name="members_area_page_id" id="members_area_page_id"
    value="<?php echo get_option('members_area_page_id'); ?>" />
<?php
}

function display_theme_panel_fields()
{
    add_settings_section("section", "All Settings", null, 'ktfu-settings');
    
    add_settings_field("join_url", "Join URL", "display_join_url_element", 'ktfu-settings', "section");
    add_settings_field("contact_url", "Contact URL", "display_contact_url", 'ktfu-settings', "section");
    add_settings_field("members_area_page_id", "Members area page ID", "display_members_area_page_id_element", 'ktfu-settings', "section");
    
    register_setting("section", "members_area_page_id");
    register_setting("section", "join_url");
    register_setting("section", "contact_url");
}

add_action("admin_init", "display_theme_panel_fields");
