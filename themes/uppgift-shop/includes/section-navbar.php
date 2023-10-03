<?php
$theme_location = 'top-menu';
$theme_locations = get_nav_menu_locations();
$menu_obj = get_term($theme_locations[$theme_location], 'nav_menu');
$menu_id = $menu_obj->term_id;
?>



<?php wp_nav_menu(
    array(
        'theme_location' => 'top-menu'
    )
) ?>