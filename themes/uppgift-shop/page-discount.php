<div class="content">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
<?php echo do_shortcode("[products limit='4' columns='4' orderby='popularity' class='quick-sale' on_sale='true' ]"); ?>

                <?php the_content(); ?>
            <?php endwhile; else: endif; ?>
    </div>
    