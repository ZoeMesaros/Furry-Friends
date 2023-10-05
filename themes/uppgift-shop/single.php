<?php get_header(); ?>

<section>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-5">
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