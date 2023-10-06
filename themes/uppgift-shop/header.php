<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>
        <?php wp_title(); ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>" type="text/css" />
    <script src="https://kit.fontawesome.com/b3674b136c.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php get_template_part('includes/section', 'navbar'); ?>

<!-- Kontakt -->
<?php
$args = array(
    'post_type'      => 'stores',  
    'posts_per_page' => -1,
);

$stores = new WP_Query($args);

if ($stores->have_posts()) :
    echo '<div class="store-list">';
    while ($stores->have_posts()) : $stores->the_post();
        // Display store information using ACF fields
        $storeName    = get_field('store_name');
        $OpenHoursWeek =   get_field('store_hours_weekdays');
        $OpenHoursWeekends =   get_field('store_hours_weekdays');
        $storeAddress = get_field('store_address');
        $storePhone   = get_field('store_phone');
        $storeEmail   = get_field('store_email');

        // Output store information as needed
        echo '<div class="store-item">';
        echo '<p>' . esc_html($storeName) . '</p>';
        echo '<p>Öppettider Vardagar: ' . esc_html($OpenHoursWeek) . '</p>';
        echo '<p>Öppettider Helger: ' . esc_html($OpenHoursWeekends) . '</p>';
        echo '<p>Adress: ' . esc_html($storeAddress) . '</p>';
        echo '<p>Tel: ' . esc_html($storePhone) . '</p>';
        echo '<p>E-post: ' . esc_html($storeEmail) . '</p>';
        echo '</div>';
    endwhile;
    echo '</div>';
    wp_reset_postdata();
else :
    echo 'No stores found.';
endif;
?>