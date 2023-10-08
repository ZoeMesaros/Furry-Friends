
<?php
$contactTitle = get_field('contact_title', get_the_ID());
?>

<?php get_header(); ?>

<section>
    <?php if ($contactTitle): ?> 
        <h1><?php echo esc_html($contactTitle); ?></h1>
    <?php endif; ?>

    <?php
    echo do_shortcode('[contact-form-7 id="ac0e918" title="Contact form 1"]');
    ?>
</section>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>No posts found</p>
<?php endif; ?>