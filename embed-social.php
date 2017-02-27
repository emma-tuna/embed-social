<?php

/**
 * @link              http://tunatraffic.com
 * @since             1.0.0
 * @package           Embed_Social
 *
 * @wordpress-plugin
 * Plugin Name:       Embed Social
 * Plugin URI:        http://example.com/i-embed-uri/
 * Description:       Embed images from Pinterest or Instegram on your site with a shortcode
 * Version:           1.1.1
 * Author:            Tuna Traffic
 * Author URI:        http://tunatraffic.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       embed-social
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Define url and path constants
 */
define( 'ES__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ES__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


/**
 * Register scripts and styles to be enqueued later
 */
function es_register_scripts(){
	wp_register_script( 'pin-embed-js', '//assets.pinterest.com/js/pinit.js' );
    wp_register_style( 'es-styles', ES__PLUGIN_URL . '/styles/styles.css');
}
add_action( 'wp_enqueue_scripts', 'es_register_scripts' );


/**
 * Require shortcode file
 */
require_once( ES__PLUGIN_DIR . 'es-shortcode.php' );
require_once( ES__PLUGIN_DIR . 'es-wysiwyg-button.php' );
