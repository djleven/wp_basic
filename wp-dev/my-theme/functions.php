<?php

add_action( 'after_setup_theme', 'my_theme_setup' );
function my_theme_setup() {
    load_theme_textdomain( 'my_theme', get_template_directory() . '/languages' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'my_theme' ) ) );
}

/**
 * Enqueue styles.
 */
function my_theme_load_styles()
{
    wp_enqueue_style('my_theme_style', get_stylesheet_uri());

    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_load_styles' );


/**
 *
 * Create welcome(homepage) and about pages upon theme activation.
 *
 */
function my_theme_activation () {

    if(is_admin()) {

        $about_page_title = 'About';
        $about_page_check = get_page_by_title($about_page_title);

        if (!$about_page_check) {
            $about_page = create_page(
                'About',
                'about',
                'This is about us page page. Since we don\'t know who we are, there is really not much to say. 
                Other than random stuff that is!'
            );
            if($about_page) {
//                // this is already the default so it should already be in place
//                update_option( 'page_for_posts', 2 );
            }
        }

        $home_page_title = 'Homepage';
        $home_page_check = get_page_by_title($home_page_title);

        if (!$home_page_check) {
            $home_page = create_page(
                'Welcome',
                'welcome',
                'Welcome to the Welcome page!!'
            );
            if($home_page) {
                update_option( 'page_on_front', $home_page );
                update_option( 'show_on_front', 'page' );
            }
        }
    }
}
add_action('after_switch_theme', 'my_theme_activation');

/**
 * Create a wordpress page.
 * @param $title   string
 * @param $slug    string
 * @param $content string
 *
 * @return int     the page ID or 0 if it fails
 */
function create_page($title, $slug, $content)
{
    $about_page = array(
        'post_type' => 'page',
        'post_title' => $title,
        'post_content' => $content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => $slug
    );

    return wp_insert_post($about_page);

}