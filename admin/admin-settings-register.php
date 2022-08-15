<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * register plugin settings
 */


function csi_register_settings() {
  
  /**
   * REGISTER SETTINGS
   * Registers a setting and its data.
   *
   * @param string $option_group Setting group.
   * @param string $option_name  Setting name.
   * @param array  $args         Data used to describe the setting when registered.
   */

  register_setting( 
    'csi_options',
    'csi_options',
    'csi_callback_validate_options'
  );
  
  
  /**
   * ADD SETTINGS
   * Adds a new section to a settings page.
   *
   * @param string $id           Section slug.
   * @param string $title        Section heading.
   * @param string $callback     Function that echos out any content at the top of the section.
   * @param string $page         The slug-name of the settings page on which to show the section
   */

  add_settings_section( 
    'csi_section_admin',
    'Prevent',
    'csi_callback_section_admin',
    'cleanup-scaled-images'
  );

  /**
   * ADD SETTINGS FIELDS
   * Adds a new field to a section of a settings page.
   *
   * @param string $id           Field slug.
   * @param string $title        Shown as the label for the field during output.
   * @param string $callback     Function that fills the field with the desired form inputs.
   * @param string $page         The slug-name of the settings page on which to show the section.
   * @param string $section      The slug-name of the section of the settings page in which to show the box.
   * @param array  $args         Extra arguments used when outputting the field.
   */

  add_settings_field(
    'auto_delete',
    'Auto delete Original image',
    'csi_callback_field_checkbox',
    'cleanup-scaled-images',
    'csi_section_admin',
    array( 
      'id'    => 'auto_delete',
      'label' => 'Enable',
      'supplemental' => 'Automatically delete original image after upload.'
    )
  );

  // add_settings_field(
  //   'auto_rename',
  //   'Rename scaled to original',
  //   'csi_callback_field_checkbox',
  //   'cleanup-scaled-images',
  //   'csi_section_admin',
  //   array( 
  //     'id'    => 'auto_rename',
  //     'label' => 'Enable',
  //     'supplemental' => 'Fires only if auto deleted Original is enabled.'
  //   )
  // );

  add_settings_field(
    'limit_size',
    'Limit size',
    'csi_callback_field_checkbox',
    'cleanup-scaled-images',
    'csi_section_admin',
    array( 
      'id'    => 'limit_size',
      'label' => 'Enable',
      'supplemental' => 'Reject images upload over set file size.'
    )
  );

  add_settings_field(
    'file_size',
    'File size',
    'csi_callback_field_number',
    'cleanup-scaled-images',
    'csi_section_admin',
    array( 
      'id'    => 'file_size',
      'label' => 'MB',
      'supplemental' => 'max available ' . csi_filesize_formatted( null, wp_max_upload_size() )
    )
  );

}

add_action( 'admin_init', 'csi_register_settings' );
