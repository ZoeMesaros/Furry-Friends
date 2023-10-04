<?php
$pageTitle = get_field('page_title');
$description = get_field('description');
$heroImage = get_field('hero_image')
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
<?php
$args = array(
    'post_type' => 'product',
    'stock' => 1,
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'DESC'
);
$loop = new WP_Query($args);
while ($loop->have_posts()):
    $loop->the_post();
    global $product; ?>
    <div class="span3">
        <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php if (has_post_thumbnail($loop->post->ID))
                echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
            else
                echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="My Image Placeholder" width="65px" height="115px" />'; ?>
            <h3>
                <?php the_title(); ?>
            </h3>
            <span class="price">
                <?php echo $product->get_price_html(); ?>
            </span>
        </a>
        <?php woocommerce_template_loop_add_to_cart($loop->post, $product); ?>
    </div><!-- /span3 -->
<?php endwhile; ?>
<?php wp_reset_query(); ?>


<?php get_footer(); ?>