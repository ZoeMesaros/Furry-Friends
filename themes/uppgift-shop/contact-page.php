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

    <?php
    $args = array(
        'post_type'      => 'stores',  
        'posts_per_page' => -1,
    );

    $stores = get_posts($args);

    if ($stores) :
        echo '<div class="container store-list border p-4">';
        echo '<h3 class="mb-4">Butiker & Öppettider</h3>';
        foreach ($stores as $store) {
            $storeName         = get_field('store_name', $store->ID);
            $OpenHoursWeek     = get_field('store_hours_weekdays', $store->ID);
            $OpenHoursWeekends = get_field('store_hours_weekends', $store->ID);
            $storeAddress      = get_field('store_address', $store->ID);
            $storePhone        = get_field('store_phone', $store->ID);
            $storeEmail        = get_field('store_email', $store->ID);

            // Output store information as needed
            echo '<div class="row store-item mb-4 border-bottom pb-3">';
            echo '<div class="col-md-6">';
            echo '<p class="mb-2"><strong>' . esc_html($storeName) . '</strong></p>';
            if ($OpenHoursWeek) {
                echo '<p>Vardagar: ' . esc_html($OpenHoursWeek) . '</p>';
            }
            if ($OpenHoursWeekends) {
                echo '<p>Helger: ' . esc_html($OpenHoursWeekends) . '</p>';
            }
            echo '</div>'; 
            echo '<div class="col-md-6">';
            echo '<p>Adress: ' . esc_html($storeAddress) . '</p>';
            echo '<p>Tel: ' . esc_html($storePhone) . '</p>';
            echo '<p>E-post: ' . esc_html($storeEmail) . '</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    else :
        echo '<div class="container"><p class="alert alert-warning">No stores found.</p></div>';
    endif;
    ?>
</section>

<?php get_footer(); ?>
