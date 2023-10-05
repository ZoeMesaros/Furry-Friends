<?php get_header(); ?>


<section>
    <?php if (have_rows('product_page')): ?>
        <?php while (have_rows('product_page')):
            the_row(); ?>
            <?php if (get_row_layout() == 'filter_field'): ?>
                <?php get_template_part('includes/content', 'sidebar'); ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
    <div class="content">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>

                <?php the_content(); ?>
            <?php endwhile; else: endif; ?>
    </div>
</section>

<?php get_footer(); ?>