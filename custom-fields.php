<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

add_action('cmb2_admin_init', 'crc_register_faq_fields');

require_once WPMU_PLUGIN_DIR . '/cmb2-attached-posts/cmb2-attached-posts-field.php';

function crc_register_faq_fields()
{
    $prefix = 'faq_';

    $fields = new_cmb2_box(array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__('Q&A data', 'cmb2'),
        'object_types'  => array( 'page' ),
        'show_on'       => array( 'key' => 'page-template', 'value' =>  'page-templates/faq-template.php' ),
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Introduction', 'cmb2'),
        'id'         => $prefix . 'intro',
        'type'       => 'textarea',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Image', 'cmb2'),
        'id'         => $prefix . 'image',
        'type'       => 'file',
    ));
    
    $group_field_id = $fields->add_field(array(
        'name'       => esc_html__('Questions and answers', 'cmb2'),
        'id'         => $prefix . 'faq',
        'type'       => 'group',
        'options'     => array(
            'group_title'   => 'Question {#}',
            'closed'        => true,
            'sortable'      => true,
        ),
        
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Question',
        'id'   => 'question',
        'type' => 'text',
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Answer',
        'id'   => 'answer',
        'type' => 'textarea',
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Image',
        'id'   => 'image',
        'type' => 'file',
    ));
}

add_action('cmb2_admin_init', 'crc_register_sponsor_fields');

function crc_register_sponsor_fields()
{
    $prefix = 'sponsors_';

    $fields = new_cmb2_box(array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__('Sponsor data', 'cmb2'),
        'object_types'  => array( 'sponsor' ),
    ));
    
    $group_field_id = $fields->add_field(array(
        'name'       => esc_html__('Sponsors', 'cmb2'),
        'id'         => $prefix . 'sponsors',
        'type'       => 'group',
        'options'     => array(
            'group_title'   => 'Sponsor {#}',
            'closed'        => true,
            'sortable'      => true,
        ),
        
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'URL',
        'id'   => 'url',
        'type' => 'text',
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Image',
        'id'   =>  'image',
        'type' => 'file',
    ));
}

function crc_register_people_fields()
{
    $prefix = 'people_';

    $fields = new_cmb2_box(array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__('People data', 'cmb2'),
        'object_types'  => array( 'page' ),
        'show_on'       => array( 'key' => 'page-template', 'value' =>  'page-templates/people-template.php' ),
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Introduction', 'cmb2'),
        'id'         => $prefix . 'intro',
        'type'       => 'textarea',
    ));
    
    $group_field_id = $fields->add_field(array(
        'name'       => esc_html__('People', 'cmb2'),
        'id'         => $prefix . 'people',
        'type'       => 'group',
        'options'     => array(
            'group_title'   => 'Person {#}',
            'closed'        => true,
            'sortable'      => true,
        ),
        
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Name',
        'id'   => 'p_name',
        'type' => 'text',
    ));

    $fields->add_group_field($group_field_id, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ));

    $fields->add_group_field($group_field_id, array(
        'name' => 'Email',
        'id'   => 'email',
        'type' => 'text',
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Bio',
        'id'   => 'bio',
        'type' => 'textarea',
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Image',
        'id'   => 'image',
        'type' => 'file',
    ));
}

add_action('cmb2_admin_init', 'crc_register_boxes_fields');

function crc_register_boxes_fields()
{
    $prefix = 'boxes_';

    $fields = new_cmb2_box(array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__('Data', 'cmb2'),
        'object_types'  => array( 'page' ),
        'show_on'       => array( 'key' => 'page-template', 'value' =>  'page-templates/boxes-template.php' ),
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Hero image', 'cmb2'),
        'id'         => $prefix . 'hero',
        'type'       => 'file',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Headline', 'cmb2'),
        'id'         => $prefix . 'headline',
        'type'       => 'text',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Introduction', 'cmb2'),
        'id'         => $prefix . 'intro',
        'type'       => 'textarea',
    ));

    $group_field_id = $fields->add_field(array(
        'name'       => esc_html__('Boxes', 'cmb2'),
        'id'         => $prefix . 'boxes',
        'type'       => 'group',
        'options'     => array(
            'group_title'   => 'Box {#}',
            'closed'        => true,
            'sortable'      => true,
        ),
        
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Blurb',
        'id'   => 'blurb',
        'type' => 'textarea',
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Image',
        'id'   => 'image',
        'type' => 'file',
    ));

    $fields->add_group_field($group_field_id, array(
        'name' => 'Link',
        'id'   => 'link',
        'type'    => 'custom_attached_posts',
        'options' => array(
            'filter_boxes'    => true,
            'query_args'      => array(
                'posts_per_page' => 100,
                'post_type'      => 'page',
            ),
        ),
    ));
}


add_action('cmb2_admin_init', 'crc_register_join_fields');

function crc_register_join_fields()
{
    $prefix = 'join_';

    $fields = new_cmb2_box(array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__('Data', 'cmb2'),
        'object_types'  => array( 'page' ),
        'show_on'       => array( 'key' => 'page-template', 'value' =>  'page-templates/join-template.php' ),
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Memberhsip group', 'cmb2'),
        'id'         => $prefix . 'group',
        'type'       => 'text_small',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Hero image', 'cmb2'),
        'id'         => $prefix . 'hero',
        'type'       => 'file',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Heading', 'cmb2'),
        'id'         => $prefix . 'heading',
        'type'       => 'text',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Introduction', 'cmb2'),
        'id'         => $prefix . 'intro',
        'type'       => 'textarea',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Collage image 1', 'cmb2'),
        'id'         => $prefix . 'collage1',
        'type'       => 'file',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Collage image 2', 'cmb2'),
        'id'         => $prefix . 'collage2',
        'type'       => 'file',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Collage image 3', 'cmb2'),
        'id'         => $prefix . 'collage3',
        'type'       => 'file',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Collage image 4', 'cmb2'),
        'id'         => $prefix . 'collage4',
        'type'       => 'file',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Collage image 5', 'cmb2'),
        'id'         => $prefix . 'collage5',
        'type'       => 'file',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Collage image 6', 'cmb2'),
        'id'         => $prefix . 'collage6',
        'type'       => 'file',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Collage image 7', 'cmb2'),
        'id'         => $prefix . 'collage7',
        'type'       => 'file',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Collage image 8', 'cmb2'),
        'id'         => $prefix . 'collage8',
        'type'       => 'file',
    ));
}

add_action('cmb2_admin_init', 'crc_register_home_fields');

function crc_register_home_fields()
{
    $prefix = 'home_';

    $fields = new_cmb2_box(array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__('Home data', 'cmb2'),
        'object_types'  => array( 'page' ),
        'show_on'       => array( 'key' => 'page-template', 'value' =>  'page-templates/home-template.php' ),
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Headline', 'cmb2'),
        'id'         => $prefix . 'headline',
        'type'       => 'text',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Introduction', 'cmb2'),
        'id'         => $prefix . 'intro',
        'type'       => 'textarea',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Action title', 'cmb2'),
        'id'         => $prefix . 'action_title',
        'type'       => 'text',
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Action link', 'cmb2'),
        'id'         => $prefix . 'action_link',
        'type'    => 'custom_attached_posts',
        'options' => array(
            'filter_boxes'    => true,
            'query_args'      => array(
                'posts_per_page' => 100,
                'post_type'      => 'page',
            ),
        ),
    ));

    $fields->add_field(array(
        'name'       => esc_html__('Hero image', 'cmb2'),
        'id'         => $prefix . 'hero',
        'type'       => 'file',
    ));
    
    
    $group_field_id = $fields->add_field(array(
        'name'       => esc_html__('Banners', 'cmb2'),
        'id'         => $prefix . 'banners',
        'type'       => 'group',
        'options'     => array(
            'group_title'   => 'Banner {#}',
            'closed'        => true,
            'sortable'      => true,
        ),
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Blurb',
        'id'   => 'blurb',
        'type' => 'textarea',
    ));
    
    $fields->add_group_field($group_field_id, array(
        'name' => 'Image',
        'id'   => 'image',
        'type' => 'file',
    ));

    $fields->add_group_field($group_field_id, array(
        'name'    => 'Link',
        'id'      => 'link',
        'type'    => 'custom_attached_posts',
        'options' => array(
            'filter_boxes'    => true,
            'query_args'      => array(
                'posts_per_page' => 100,
                'post_type'      => 'page',
            ),
        ),
    ));
}
