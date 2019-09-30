<?php get_header();
$lastWordShortcodeExists = shortcode_exists( 'my-last-word' );
?>
<p class="lead">
    <?php if ($lastWordShortcodeExists) :
        echo do_shortcode('[my-last-word]');
    else :
        esc_html_e( 'This is a simple hero unit, a simple jumbotron-style component for
        calling extra attention to featured content or information.', 'my_theme' );
    endif ?>
</p>

<a class="btn btn-primary btn-lg" href="#" role="button">
    <?php esc_html_e( 'Learn more', 'my_theme' ); ?>
</a>
<hr class="my-4">