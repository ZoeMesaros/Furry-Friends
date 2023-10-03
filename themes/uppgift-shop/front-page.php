<?php
$pageTitle = get_field('page_title');
$description = get_field('description');
$heroImage = get_field('hero_image')
    ?>

<?php get_header(); ?>

<section class="px-5 py-6 py-xxl-10 hcf-bp-center hcf-bs-cover hcf-overlay hcf-transform"
    style="background-image: url('<?php echo esc_url($heroImage); ?>');">
    <div class="container">
        <div class="row justify-content-md-left">
            <div class="col-12 col-md-11 col-lg-9 col-xl-7 col-xxl-6 text-left text-white">
                <h3 class="display-5 mb-3 me-5">
                    <?php echo $pageTitle ?>
                </h3>
            </div>
        </div>
    </div>
</section>
<p class="lead mb-5">
    <?php echo $description ?>
</p>



<?php get_footer(); ?>