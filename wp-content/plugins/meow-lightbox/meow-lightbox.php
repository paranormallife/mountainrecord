<?php
/*
Plugin Name: Meow Lightbox
Plugin URI: https://meowapps.com/meow-lightbox
Description: Lightbox designed by and for photographers.
Version: 1.7.3
Author: Jordy Meow, Thomas KIM
Author URI: https://meowapps.com
Text Domain: meow-lightbox
Domain Path: /languages
*/

if ( class_exists( 'Meow_Lightbox_Core' ) ) {
  function mwl_admin_notices() {
    echo '<div class="error"><p>Thanks for installing the Pro version of Meow Lightbox :) However, the free version is still enabled. Please disable or uninstall it.</p></div>';
  }
  add_action( 'admin_notices', 'mwl_admin_notices' );
  return;
}

// if ( !get_transient( 'mwl_event_special_message' ) ) {
//   function mwl_event_special_message_admin_notices() {
//     echo '<div class="notice notice-success"><p>Happy New Year, Happy WordPress Day, etc!</p>';
//     echo '<p>
//       <form method="post" action="">
//         <input type="hidden" name="mwl_event_special_message" value="true">
//         <input type="submit" name="submit" id="submit" class="button" value="Hide this">
//       </form>
//     </p>
//     ';
//     echo '</div>';
//   }
//   if ( isset( $_POST['mwl_event_special_message'] ) ) {
//     set_transient( 'mwl_event_special_message', 'hide', 60 * 60 * 24 * 100 );
//   }
//   else
//     add_action( 'admin_notices', 'mwl_event_special_message_admin_notices' );
// }

global $mwl_version;
$mwl_version = '1.7.3';

// Core
include "mwl_core.php";
$mwl_core = new Meow_Lightbox_Core;

// Admin
require( 'mwl_admin.php' );
$mwl_admin = new Meow_MWL_Admin( 'mwl', __FILE__, 'meow-lightbox' );
