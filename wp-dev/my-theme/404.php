<?php get_header(); ?>
    <main id="content">
        <article id="no-post" class="post not-found">
            <header class="header">
                <h1 class="entry-title"><?php esc_html_e( 'Not Found', 'my_theme' ); ?></h1>
            </header>
            <div class="entry-content">
                <p><?php esc_html_e( 'Sorry but the content you requested seems to be missing!', 'my_theme' ); ?></p>
            </div>
        </article>
    </main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

