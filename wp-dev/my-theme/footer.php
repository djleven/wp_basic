</div>
<footer id="footer" class="text-center">
    <div id="copyright">
        &copy; <?php echo esc_html( date_i18n( __( 'Y', 'my_theme' ) ) ); ?>
        <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
    </div>
    <div>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="home" rel="home">
            <?php esc_html_e( 'home', 'my_theme' ); ?>
        </a>
        |
        <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" title="about" rel="about">
            <?php esc_html_e( 'about', 'my_theme' ); ?>
        </a>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
