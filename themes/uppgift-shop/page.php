<?php get_header(); ?>


<section>
    <div class="content">

        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>

                <?php the_content(); ?>
            <?php endwhile; else: endif; ?>
    </div>
</section>

<?php get_footer(); ?>