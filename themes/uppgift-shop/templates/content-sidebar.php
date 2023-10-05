<?php
$sidebar = get_sub_field('sidebar');
?>

<?php if ($sidebar == 'true'): ?>
    <div id="sidebar-1" class="col-sm-1 me-5" role="complementary">

        <?php if (is_active_sidebar('sidebar-1')): ?>

            <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
    <?php endif; ?>
<?php elseif ($sidebar == 'false'): ?>
    <div id="sidebar-1" class="col-sm-1 me-5" role="complementary">
        <p>Ingen produkrfiltering vald.</p>
    </div>
<?php endif ?>