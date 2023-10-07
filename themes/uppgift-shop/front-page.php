<?php
$pageTitle = get_field('page_title');
$description = get_field('description');
$heroImage = get_field('hero_image');
$lProducts = get_field('latest_products');
    ?>

<?php get_header(); ?>


<?php if ($heroImage): ?>
    <section class="px-5 py-6 py-xxl-10 hcf-bp-center hcf-bs-cover hcf-overlay hcf-transform"
        style="background-image: url('<?php echo esc_url($heroImage); ?>');">
    <?php endif; ?>
    <div class="container">
        <div class="row justify-content-md-left">
            <div class="col-12 col-md-11 col-lg-9 col-xl-7 col-xxl-6 text-center text-white">
                <?php if ($pageTitle): ?>
                    <h3 class="display-5 mb-3 me-5">
                        <?php echo $pageTitle ?>
                    </h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php if ($description): ?>
    <p class="lead mb-5">
        <?php echo $description ?>
    </p>
<?php endif; ?>
<?php if ($lProducts): ?>
    <h2>
        <?php echo $lProducts ?>
    </h2>
<?php endif; ?>
<?php echo do_shortcode("[products limit='4' columns='4' orderby='id' order='DESC' visibility='visible']"); ?>
<h3 style="color:red; font-wight:300;">Rea Produkter!</h3>
<?php echo do_shortcode("[products limit='4' columns='4' orderby='popularity' class='quick-sale' on_sale='true' ]"); ?>


<!-- Store custom posts -->
<?php
$args = array(
    'post_type'      => 'stores',  
    'posts_per_page' => -1,
);

$stores = new WP_Query($args);

if ($stores->have_posts()) :
    echo '<div class="store-list">';
    echo '<h3>Butiker och Öppettider</h3>';
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
  

<?php get_footer(); ?>