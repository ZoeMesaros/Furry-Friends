<?php
$contactTitle = get_field('contact_title');
?>

<?php get_header(); ?>
<?php if ($contactTitle): ?>
    <h1 style="text-align: center; margin: 6%;">
        <?php echo esc_html($contactTitle); ?>
    </h1>
<?php endif; ?>
<section class="contact-section" style="display: flex; margin: 8%;">

    <div id="contact">
        <?php echo do_shortcode('[contact-form-7 id="ac0e918" title="Contact form 1"]'); ?>
    </div>

    <?php
    $args = array(
        'post_type' => 'stores',
        'posts_per_page' => -1,
    );

    $stores = get_posts($args);

    if ($stores): ?>
        <div id="stores" class="container store-list">
            <h3 class="mb-4">Butiker & Öppettider</h3>
            <?php foreach ($stores as $store):
                $storeName = get_field('store_name', $store->ID);
                $openHoursWeek = get_field('store_hours_weekdays', $store->ID);
                $openHoursWeekends = get_field('store_hours_weekends', $store->ID);
                $storeAddress = get_field('store_address', $store->ID);
                $storePhone = get_field('store_phone', $store->ID);
                $storeEmail = get_field('store_email', $store->ID);
                $storeImage = get_field('store_image', $store->ID);
                ?>
                <div class="row store-item mb-4 border-bottom pb-3">
                    <div class="col-md-6">
                        <p class="mb-2"><strong>
                                <?php echo esc_html($storeName); ?>
                            </strong></p>
                        <?php if ($openHoursWeek): ?>
                            <p>Vardagar:
                                <?php echo esc_html($openHoursWeek); ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($openHoursWeekends): ?>
                            <p>Helger:
                                <?php echo esc_html($openHoursWeekends); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <p>Adress:
                            <?php echo esc_html($storeAddress); ?>
                        </p>
                        <p>Tel:
                            <?php echo esc_html($storePhone); ?>
                        </p>
                        <p>E-post:
                            <?php echo esc_html($storeEmail); ?>
                        </p>
                    </div>
                    <img style="width: 70%;" src="<?php echo esc_url($storeImage); ?>"
                        alt="<?php echo esc_attr($storeName); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="container">
            <p class="alert alert-warning">No stores found.</p>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>