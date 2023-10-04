<?php get_header(); ?>

<div class="container">
    <br>
    <h4>Sökresultat för "
        <?php echo get_search_query(); ?>
        "
    </h4>
    <h3>
        <?php echo single_cat_title(); ?>
    </h3>
</div>

<?php get_footer(); ?>