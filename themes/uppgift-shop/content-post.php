<?php
$postImg = $args['postImg'];
$postDescription = $args['postDescription'];
$postCategory = $args['postCategory'];

?>

<div class="container text-start">
    <?php if ($postCategory): ?>
        <div id="category-box" class="mb-3 mt-5">
            <h4 id="category">
                <?php echo $postCategory ?>
            </h4>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-5 mt-3">
        <div class="card-body">
            <h1 class="mb-5 d-grid gap-5">
                <?php echo get_the_title(); ?>
            </h1>

            <section class="row justify-content-center align-items-center">
                <?php if ($postImg): ?>
                    <div class="col-md-6">
                        <img src="<?php echo esc_url($postImg); ?>" class="img-fluid" alt="Nyhets Produkt">
                    </div>
                <?php endif; ?>

                <div class="col-md-6">
                    <?php if ($postDescription): ?>
                        <p class="description">
                            <?php echo $postDescription ?>
                        </p>
                    <?php endif; ?>
                       <?php if (!is_single()): ?>
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-primary mb-3 mt-3" target="_blank">Läs mer...</a>
                        <?php endif; ?>
                </div>
            </section>
        </div>
    </div>
</div>