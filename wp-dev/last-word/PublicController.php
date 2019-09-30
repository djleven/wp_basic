<?php
/**
 * Coordinates the public-facing functionality of the plugin.
 *
 * Plugin Convention:
 * Methods in underscore naming represent registered wordpress hook callbacks
 *
 * @link       https://e-leven.net/
 * @since      1.0.0
 *
 * @package    last-word
 * @subpackage last-word/public
 * @author     Kostas Stathakos <info@e-leven.net>
 */
namespace LastWord;

use LastWord\MyLastWord\MyLastWordPostContent;
use LastWord\MyLastWord\MyLastWordShortcode;

class PublicController {

    const SHORTCODE_TAG_NAME = 'my-last-word';

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     */
    public function __construct() {

        $this->registerMainHooks();
    }

    /**
     * Register the main hooks related to the public-facing functionality.
     *
     * Enqueue scripts and styles
     * Post content hook for last-word post content
     * Register the shortcode for last-word content
     * Remove shortcode content from RSS feeds
     *
     * Conditionally include custom post types on archive pages
     *
     * @since    1.0.0
     * @access   private
     */
    private function registerMainHooks() {

        add_shortcode( self::SHORTCODE_TAG_NAME, array( $this, 'shortcode_content_view_hook'));
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts' ));
        add_action( 'the_content', array($this, 'post_content_view_hook' ));
        add_filter( 'the_content_feed', array($this, 'remove_shortcode_from_feed'));
    }

    /**
     * Determine if we are on a post type screen
     *
     * @since     1.0.0
     * @return    boolean
     */
    private function isPostContent(){

        $result = false;
        $screen = get_post_type();

        if ($screen == 'post') {
            $result = true;
        }


        return $result;
    }

    /**
     * Determine if we are on a screen where an last-word shortcode is being used
     *
     * @since     1.0.0
     * @return    boolean
     */
    private function isLastWordShortcode(){

        $result = false;
        global $post;
        // $post not set on 404 pages, returns Trying to get property of non-object
        if (isset( $post )) {

            $result = has_shortcode( $post->post_content, self::SHORTCODE_TAG_NAME);
        }

        return $result;
    }

    /**
     * Determine if we are on an active last-word screen
     *
     * @since     1.0.0
     * @return    boolean
     */
    private function isLastWordScreen(){

        $result = false;
        if($this->isLastWordShortcode()) {
            $result = true;
        }
        elseif($this->isPostContent()) {
            $result = true;
        }

        return $result;
    }

    /**
     * Orchestrate the setup and rendering of the last-word post content view
     *
     * @since    1.0.0
     * @param     string     $content  The wp $content
     * @return    string     The last-word WpPostContentType view output
     */
    public function post_content_view_hook($content) {

        if($this->isPostContent() && !is_feed()) {

            $my_content = new MyLastWordPostContent($content);

            return $my_content->contentOutput();
        }

        return $content;
    }

    /**
     * Shortcode hook callback
     * Render the shortcode view
     *
     * Int the future, we would also handle the shortcode user input here
     *
     * @since     1.0.0
     * @param     $atts    array | string
     *                     associative array of attributes, or an empty string if no attributes given
     *
     * @return    string   The shortcode view
     */
    public function shortcode_content_view_hook($atts) {
        // In the future, we may want to add/ accept shortcode parameters $atts
        // and pass them to the constructor -> new MyLastWordShortcode($atts);
        $my_shorcode = new MyLastWordShortcode();

        return $my_shorcode->contentOutput();
    }

    /**
     * Register the JavaScript and CSS for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        $pluginPublicFolder = 'public/';
        $cssFilePath = $pluginPublicFolder . 'css/' . LAST_WORD_WP_NAME . '.css';
        $jsFilePath = $pluginPublicFolder . 'js/' . LAST_WORD_WP_NAME . '.js';

        if($this->isLastWordScreen()) {
            wp_enqueue_script(
                LAST_WORD_WP_NAME, LAST_WORD_PLUGIN_URL . $jsFilePath, array('jquery'), 0.1, true);
            wp_enqueue_style(
                LAST_WORD_WP_NAME, LAST_WORD_PLUGIN_URL . $cssFilePath);
        }
    }

    /**
     * Remove the shortcode content from RSS feed hook callback
     *
     * @since    1.0.0
     * @param    $content string  The current post content.
     * @return   mixed
     */
    public function remove_shortcode_from_feed($content){

        remove_shortcode(self::SHORTCODE_TAG_NAME);

        return $content;
    }
}
