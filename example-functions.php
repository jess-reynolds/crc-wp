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

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 $cmb CMB2 object.
 *
 * @return bool      True if metabox should show
 */
function yourprefix_show_if_front_page($cmb)
{
    // Don't show this metabox if it's not the front page template.
    if (get_option('page_on_front') !== $cmb->object_id) {
        return false;
    }
    return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field $field Field object.
 *
 * @return bool              True if metabox should show
 */
function yourprefix_hide_if_no_cats($field)
{
    // Don't show this field if not in the cats category.
    if (! has_tag('cats', $field->object_id)) {
        return false;
    }
    return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function yourprefix_render_row_cb($field_args, $field)
{
    $classes     = $field->row_classes();
    $id          = $field->args('id');
    $label       = $field->args('name');
    $name        = $field->args('_name');
    $value       = $field->escaped_value();
    $description = $field->args('description'); ?>
<div class="custom-field-row <?php echo esc_attr($classes); ?>">
	<p><label for="<?php echo esc_attr($id); ?>"><?php echo esc_html($label); ?></label></p>
	<p><input id="<?php echo esc_attr($id); ?>" type="text" name="<?php echo esc_attr($name); ?>"
		 value="<?php echo $value; ?>" /></p>
	<p class="description"><?php echo esc_html($description); ?>
	</p>
</div>
<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function yourprefix_display_text_small_column($field_args, $field)
{
    ?>
<div class="custom-column-display <?php echo esc_attr($field->row_classes()); ?>">
	<p><?php echo $field->escaped_value(); ?>
	</p>
	<p class="description"><?php echo esc_html($field->args('description')); ?>
	</p>
</div>
<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array      $field_args Array of field parameters.
 * @param  CMB2_Field $field      Field object.
 */
function yourprefix_before_row_if_2($field_args, $field)
{
    if (2 == $field->object_id) {
        echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
    } else {
        echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
    }
}

add_action('cmb2_admin_init', 'yourprefix_register_demo_metabox');
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function yourprefix_register_demo_metabox()
{
    $prefix = 'qanda_';

    $cmb_demo = new_cmb2_box(array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__('Q&A data', 'cmb2'),
        'object_types'  => array( 'page' ), // Post type
        'show_on'       => array( 'key' => 'page-template', 'value' =>  'page-templates/qanda-template.php' ),
    ));

    $cmb_demo->add_field(array(
        'name'       => esc_html__('Introduction', 'cmb2'),
        'id'         => $prefix . 'intro',
        'type'       => 'textarea',
    ));
    
    $group_field_id = $cmb_demo->add_field(array(
        'name'       => esc_html__('Questions and answers', 'cmb2'),
        'id'         => $prefix . 'qanda',
        'type'       => 'group',
        
    ));
    
    $cmb_demo->add_group_field($group_field_id, array(
        'name' => 'Question',
        'id'   => 'question',
        'type' => 'text',
    ));
    
    $cmb_demo->add_group_field($group_field_id, array(
        'name' => 'Answer',
        'id'   => 'answer',
        'type' => 'textarea',
    ));
    
    $cmb_demo->add_group_field($group_field_id, array(
        'name' => 'Image',
        'id'   => 'image',
        'type' => 'file',
    ));
}
