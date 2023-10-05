<?php
$header = get_field('footer_header');
$content = get_field('footer_content');
$linkHeader = get_field('link_header');
$copyright = get_field('copyright_text');
$rows = get_field('links');
$opening = get_field('opening')
    ?>


<?php wp_footer(); ?>

<footer>
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4">

                <?php if ($header): ?>
                    <h5 class="mb-3 text-dark">
                        <?php echo $header ?>
                    </h5>
                <?php endif; ?>
                <?php if ($content): ?>
                    <p>
                        <?php echo $content ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <?php if ($linkHeader): ?>
                    <h5 class="mb-3 text-dark">
                        <?php echo $linkHeader ?>
                    </h5>
                <?php endif; ?>
                <?php
                if ($rows) {
                    echo '<ul class="list-unstyled mb-0">';
                    foreach ($rows as $row) {
                        $link = $row['link_1'];
                        $name = $row['link_name'];
                        echo '<li class="mb-1">';
                        echo '<a href="' . $link . ' " style="color: #4f4f4f;">' . $name . '</a>';
                        echo '</li>';
                    }
                    echo '</ul>';
                }

                ?>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <?php if ($opening): ?>
                    <h5 class="mb-1 text-dark">
                        <?php echo $opening['opening_title'] ?>
                    </h5>
                    <table class="table" style="border-color: #666;">
                        <tbody>
                            <tr>
                                <td>Mån - Fre:</td>
                                <td>
                                    <?php echo $opening['opening_week_from'] ?> -
                                    <?php echo $opening['opening_week_to'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Lör - Sön:</td>
                                <td>
                                    <?php echo $opening['opening_weekend_from'] ?> -
                                    <?php echo $opening['opening_weekend_to'] ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if ($copyright): ?>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <?php echo $copyright ?>
        <?php endif; ?>
    </div>
</footer>
</body>

</html>