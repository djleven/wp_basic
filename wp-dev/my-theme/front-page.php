<?php get_header();?>

<main id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content jumbotron">
                <header class="header">
                    <h1 class="entry-title text-center">
                        <?php echo the_title(); ?>
                    </h1>
                </header>
                <div class="container">
                    <div class="text-center">
                        <?php echo the_content(); ?>
                        <hr class="my-4">
                    </div>
                    <div class="row">
                        <div class="col-sm">

                            <?php get_template_part( 'static-column-text' ); ?>

                        </div>
                        <div class="col-sm">

                            <?php get_template_part( 'static-column-text' ); ?>

                        </div>
                    </div>
                </div>

            </div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
