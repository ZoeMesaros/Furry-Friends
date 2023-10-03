<?php
$pageTitle = get_field('page_title');
$description = get_field('description');
$heroImage = get_field('hero_image')
    ?>

<?php get_header(); ?>


<div id="hero" style="background-image: url('<?php echo esc_url($heroImage); ?>'); height: 550px; width: 100%; ">
    <div class="container d-flex align-items-center justify-content-center h-250">
        <?php if ($pageTitle): ?>
            <h2>
                <?php echo $pageTitle; ?>
            </h2>
        <?php endif; ?>
        <?php if ($description): ?>
            <?php echo $description; ?>
        <?php endif; ?>
    </div>
</div>

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