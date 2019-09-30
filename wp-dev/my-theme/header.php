<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
    <header id="header">
        <div id="branding">
            <div id="site-title">
                <h1>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                       title="<?php echo esc_html( get_current_theme() ); ?>"
                       rel="home"><?php echo esc_html( get_current_theme() ); ?>
                    </a>
                </h1>


            </div>
            <div id="site-description"><?php bloginfo( 'description' ); ?></div>
        </div>
        <nav id="menu">
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        </nav>
        <div class="clearfix"></div>
    </header>
    <div id="container">
<!---->
<?php //if ( is_front_page() || is_home() || is_front_page() && is_home() ) { \do something} ?>