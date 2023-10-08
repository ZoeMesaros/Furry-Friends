<?php

/* Template Name:  Store list */
?>
<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>