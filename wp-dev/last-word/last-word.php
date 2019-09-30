<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Last Word
 * Plugin URI:        https://wordpress.org/plugins/last-word/
 * Description:       This plugin always wants to have the last word
 * Version:           1.0.0
 * Author:            Kostas Stathakos
 * Author URI:        https://e-leven.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       last_word
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
if ( defined( 'LAST_WORD_WP_NAME' ) ) {
    die;
}
define( 'LAST_WORD_WP_NAME', 'last-word' );
define( 'LAST_WORD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'LAST_WORD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * The core plugin entry class
 */
include_once plugin_dir_path( __FILE__ ) . '/LastWordInit.php';

new LastWord\LastWordInit();