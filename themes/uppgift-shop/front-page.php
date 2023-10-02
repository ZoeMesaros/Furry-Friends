
<?php get_header(); ?>

<?php 
$heroImage = get_field('hero_image');
$pageTitle = get_field('page_title'); 
$description = get_field('description'); 
$gallery = get_field('gallery')
?>

<section>
<div class="container">
    <h1><?php the_title(); ?></h1>

    <?php if(have_posts()): while(have_posts()) : the_post(); ?>

    <?php the_content(); ?>
    <?php endwhile; else: endif; ?>

    <?php if($pageTitle): ?>
        <h2><?php echo $pageTitle; ?></h2>
    <?php endif; ?>
    <?php if($heroImage): ?>
        <img src="<?php echo esc_url($heroImage); ?>" alt="Hero Image" /> 
    <?php endif; ?>

    <?php if($description): ?>
    <?php echo $description; ?>
    <?php endif; ?>

    <?php if($gallery): ?>
    <?php foreach($gallery as $img): ?>
        <img src="<?php echo $img['sizes']['thumbnail']; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</section>



<?php get_footer(); ?>