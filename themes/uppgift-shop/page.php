<?php get_header(); ?>


<section>
    <?php if (have_rows('product_page')): ?>
        <?php while (have_rows('product_page')):
            the_row(); ?>
            <?php if (get_row_layout() == 'filter_field'): ?>
                <?php get_template_part('includes/content', 'sidebar'); ?>
                <div class="content" id="content-products">
                <?php endif; ?>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mt-5">
                        <?php endif; ?>
                        <?php if (have_posts()):
                            while (have_posts()):
                                the_post(); ?>

                                <?php the_content(); ?>
                            <?php endwhile; else: endif; ?>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php get_footer(); ?>