<?php 
/**
 * Plugin Name:       Frontend Login
 * Plugin URI:        https://github.com/JuanNavasJN
 * Description:       Sign In and Sign Up forms for Yard Sales.
 * Version:           1.0
 * Requires at least: 6.1
 * Requires PHP:      8.1
 * Author:            Juan Navas
 * Author URI:        https://juannavas.dev/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       yardsale
 */

define("PLZ_PATH", plugin_dir_path(__FILE__));

// API Rest
require_once PLZ_PATH."/includes/API/api-register.php";
require_once PLZ_PATH."/includes/API/api-login.php";

 // Shortcodes
require_once PLZ_PATH."/public/shortcode/register-form.php";
require_once PLZ_PATH."/public/shortcode/login-form.php";

// Custom Role

function plz_plugin_activate(){
  add_role("customer", "Customer", "read_post");
}

register_activation_hook(__FILE__, "plz_plugin_activate");

function plz_plugin_deactivate(){
  remove_role("customer");
}

register_deactivation_hook(__FILE__, "plz_plugin_deactivate");