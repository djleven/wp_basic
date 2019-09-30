<?php
/**
 * This class serves as the entry point for the plugin.
 *
 * It is used to:
 * - load dependencies,
 * - define internationalization,
 * - instantiate the core plugin controllers for both the public-facing side of the site and the admin area.
 *
 * @link       https://e-leven.net/
 * @since      1.0.0
 *
 * @package    last-word
 * @author     Kostas Stathakos <info@e-leven.net>
 */
namespace LastWord;

//use LastWord\Admin\AdminController;

class LastWordInit {

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    const WPLW_ADMIN_DIR = LAST_WORD_PLUGIN_DIR . 'admin/';
    const WPLW_MY_LAST_WORD_DIR = LAST_WORD_PLUGIN_DIR . 'myLastWord/';

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin identifier, load the dependencies, define the locale, and run the core controllers.
     *
     * @since    1.0.0
     */

    public function __construct() {

        $this->version = "1.0.0";
        $this->load_dependencies();
        $this->setLocale();
        $this->run();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {

        /**
         * The class responsible for orchestrating actions that occur in the public-facing
         * side of the site.
         */
        require_once LAST_WORD_PLUGIN_DIR . 'PublicController.php';

        /**
         * The abstract superclass responsible for my last word slur.
         */
        require_once self::WPLW_MY_LAST_WORD_DIR . '/MyLastWord.php';

        /**
         * The concrete subclasses responsible for my last word post and shortcode views
         */
        require_once self::WPLW_MY_LAST_WORD_DIR . '/MyLastWordPostContent.php';
        require_once self::WPLW_MY_LAST_WORD_DIR . '/MyLastWordShortcode.php';


    }

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain() {

        load_plugin_textdomain(
            LAST_WORD_WP_NAME,
            false,
            LAST_WORD_PLUGIN_DIR . '/languages/'
        );
    }
    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the I18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function setLocale() {

        add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain'));
    }

    /**
     * Register the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function run() {

        new PublicController();
    }
}

