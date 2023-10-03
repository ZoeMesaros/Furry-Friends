<?php
$pageTitle = get_field('page_title');
$description = get_field('description');
$gallery = get_field('gallery')
    ?>

<?php get_header(); ?>

<section>
    <div class="container">
        <h1>
            <?php the_title(); ?>
        </h1>
        <?php if ($pageTitle): ?>
            <h2>
                <?php echo $pageTitle; ?>
            </h2>
        <?php endif; ?>
        <?php if ($description): ?>
            <?php echo $description; ?>
        <?php endif; ?>

        <?php if ($gallery): ?>
            <?php foreach ($gallery as $img): ?>
                <img src="<?php echo $img['sizes']['thumbnail']; ?>">
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
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