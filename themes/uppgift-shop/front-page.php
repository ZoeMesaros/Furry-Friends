<?php
$pageTitle = get_field('page_title');
$description = get_field('description');
$heroImage = get_field('hero_image');
$lProducts = get_field('latest_products');
$sProducts = get_field('sale_products');
?>

<?php get_header(); ?>


<?php if ($heroImage): ?>
    <div>
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
<section>
    <div class="content">
        <div class="container">
            <div class="col-20 mt-5">
                <?php if ($description): ?>
                    <p class="lead mb-5">
                        <?php echo $description ?>
                    </p>
                <?php endif; ?>
                <?php if ($lProducts): ?>
                    <h2 class="mb-4">
                        <?php echo $lProducts ?>
                    </h2>
                <?php endif; ?>
                <?php echo do_shortcode("[products limit='5' columns='5' orderby='id' order='DESC' visibility='visible']"); ?>
                <?php if ($sProducts): ?>
                    <h2 class="mb-4">
                        <?php echo $sProducts ?>
                    </h2>
                <?php endif; ?>
                <?php echo do_shortcode("[products limit='4' columns='4' orderby='popularity' class='quick-sale' on_sale='true' ]"); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>