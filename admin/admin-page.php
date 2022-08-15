<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Display admin page html
 */

function admin_page_html() {
  
  
  // Check user capabilities
  if ( ! current_user_can( 'manage_options' ) ) return;

  
  // Get the active tab from the $_GET param
  $default_tab = null;
  $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

  ?>
  <!-- Our admin page content should all be inside .wrap -->
  <div class="wrap">

    <!-- Page title -->
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    
    <!-- Messages -->
    <?php settings_errors(); ?>
    
    <p style="width: 700px">
     If the original image width or height is above the threshold, it will be scaled down and image will be used as the largest available "full" size; Original image will be added to uploads folder and included to attachment metadata. The plugin deletes all originals from uploads folder, making WP project lighter, easier to backup and migrate.
    </p>
    
    <!-- Tabs nav -->
    <nav class="nav-tab-wrapper">
      <a href="?page=cleanup-scaled-images" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Cleanup</a>
      <a href="?page=cleanup-scaled-images&tab=settings" class="nav-tab <?php if($tab==='settings'):?>nav-tab-active<?php endif; ?>">Settings</a>
    </nav>

    <!-- Tabs content -->
    <div class="tab-content">
    <?php switch($tab) :
      case 'settings':
        require_once plugin_dir_path(__DIR__) . 'admin/admin-tab-settings.php';
        break;
      default:
        require_once plugin_dir_path(__DIR__) . 'admin/admin-tab-default.php';
        break;
    endswitch; ?>
    </div>
  
  </div>
<?php
}

