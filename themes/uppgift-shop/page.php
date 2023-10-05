<?php get_header(); ?>


<section>
    <div id="sidebar-1" class="col-sm-1 me-5" role="complementary">

        <?php if (is_active_sidebar('sidebar-1')): ?>

            <?php dynamic_sidebar('sidebar-1'); ?>

        <?php endif; ?>

    </div>

    <div class="content">

        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>

                <?php the_content(); ?>
            <?php endwhile; else: endif; ?>
    </div>
</section>

<?php get_footer(); ?>