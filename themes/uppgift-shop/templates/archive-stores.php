<?php
/**
 * Template Name: Butikarkiv
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
            </header>

            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>

        <?php else : ?>
            <p>Inga butiker hittades.</p>
        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>
