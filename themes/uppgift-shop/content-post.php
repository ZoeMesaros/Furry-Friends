<?php
$postImg = $args['postImg'];
$postDescription = $args['postDescription'];
$postLink = $args['postLink'];
$postCategory = $args['postCategory'];
?>


<?php get_header(); ?>

<h1><?php echo get_the_title(); ?></h1>

<?php if ($postImg): ?>
    <img src="<?php echo esc_url($postImg); ?>" alt="Nyhets Produkt">
<?php endif; ?>



<?php get_footer(); ?>