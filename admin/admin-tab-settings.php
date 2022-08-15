<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * admin tab settings html
 */

?>
    <!-- the content -->
    <div class="content">

     <form action="options.php" method="post">
        <?php
        // output security fields
        settings_fields( 'csi_options');

        // output setting sections
        do_settings_sections( 'cleanup-scaled-images' );
        
        // submit button
        submit_button();
        ?>
      </form>
      
    </div>
  
<?php