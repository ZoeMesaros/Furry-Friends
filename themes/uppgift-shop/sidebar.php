<?php if (is_product()) {
    return;
} else {
    echo '<section class="mb-5">
    <div id="sidebar" class="col-md-2 mt-5" role="complementary">';
    dynamic_sidebar('sidebar-1');
    echo '</div>';
}