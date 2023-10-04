<?php


//Declare Woocommerce support
function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');



//Woocommerce hooks for main content
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start()
{
    echo '<section>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-5">';
}

function my_theme_wrapper_end()
{
    echo '</div>
    </div>
</div>
</div>
</section>';
}


//Woocommerce override stylesheet
function wp_enqueue_woocommerce_style()
{
    wp_register_style('mytheme-woocommerce', get_template_directory_uri() . '/css/woocommerce.css');

    if (class_exists('woocommerce')) {
        wp_enqueue_style('mytheme-woocommerce');
    }
}
add_action('wp_enqueue_scripts', 'wp_enqueue_woocommerce_style');



//Register JS
wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array(), 1.1, true);

//Register Menus
function register_menus()
{
    register_nav_menus(

        array(
            'top-menu' => 'Header Menu Location',
            'footer-menu' => 'Footer Menu Location'
        )
    );
}
add_action('init', 'register_menus');



//Navigation menu layout
add_filter('wp_nav_menu_items', 'my_wp_nav_menu_items', 10, 2);

function my_wp_nav_menu_items($items, $args)
{

    // get menu
    $menu = wp_get_nav_menu_object($args->menu);


    // modify primary only
    if ($args->theme_location == 'top-menu') {

        // vars
        $logo = get_field('logo', $menu);
        $pageLink = get_field('my_page_link', $menu);
        $linkTitle = get_field('my_page_title', $menu);

        // prepend logo
        $html_logo = '<div style="width: 100%"> <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand"> <img class="navbar-img" src="' . $logo . '" alt="Furry Friends Logo">             </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">';

        $html_pageLink = get_search_form() . '
    <div id="navbar-login" class="navbar-nav ms-auto">
        <a href="' . $pageLink . '
    " class="nav-item nav-link">';

        $html_linkTitle = '
' . $linkTitle . '
</a>
</div>
</div>

</div>
</nav>
</div>';

        // append html
        $items = $html_logo . $items . $html_pageLink . $html_linkTitle;

    }


    // return
    return $items;

}





add_action('woocommerce_before_shop_loop_item_title', 'quadlayers_new_product_badge', 3);

function quadlayers_new_product_badge()
{
    global $product;
    $newness_days = 10;
    $created = strtotime($product->get_date_created());
    if ((time() - (60 * 60 * 24 * $newness_days)) < $created) {
        echo '<span class="itsnew onsale">' . esc_html__('New!', 'woocommerce') . '</span>';
    }
}