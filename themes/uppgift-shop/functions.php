<?php

add_theme_support('widgets');
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

    if (is_product()) {
        echo '<div class="content" id="content-products">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-5">';
    } else {
        echo '
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="title-section">
                        <h1>
        Våra produkter';
        echo '</h1>
                    </div>
                </div>
            </div>
            <div class="row collapsible">
                <div class="col-10" id="products-section">
    
                    <div class="content-section p-5 m-5">';
    }


}


function my_theme_wrapper_end()
{

    if (is_product()) {
        echo '</div>
    </div>
</div>
</div>
</section>';
    } else {
        echo '</div>
        </div>
        <div class=" col-md-2 pt-5 " id="sidebar">
          <div class="sidebar-item ">
            <div class="make-me-sticky">';
        get_sidebar();
        echo '</div>
          </div>
        </div>
    </div>
</div>
';
    }

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

function mytheme_enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('script', get_template_directory_uri() . './js/footer-script.js', array('jquery'), '1.1', true);
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');

//Register JS
wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array(), 1.1, true);

//Register Menus
add_theme_support('menus');
function register_menus()
{
    register_nav_menus(

        array(
            'top-menu' => 'Header Menu Location',
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
        <div class="container-fluid ms-4 ">
            <a  class="navbar-brand " > <img class="navbar-img" src="' . $logo . '" alt="Furry Friends Logo">             </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">';


        $html_pageLink = '
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



function my_sidebars()
{
    register_sidebar(
        array(
            'name' => __('Primary Sidebar'),
            'id' => 'sidebar-1',
            'before_widget' => '<aside id="sidebar-filter" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action('widgets_init', 'my_sidebars');


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(
        array(
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => 'Theme Footer Settings',
            'menu_title' => 'Footer',
            'parent_slug' => 'theme-general-settings',
        )
    );

}

// Skapa en anpassad posttyp för butiker
function create_store_post_type()
{
    $labels = array(
        'name' => 'Butiker',
        'singular_name' => 'Butik',
        'menu_name' => 'Butiker',
        'name_admin_bar' => 'Butiker',
        'add_new' => 'Lägg till ny',
        'add_new_item' => 'Lägg till ny butik',
        'new_item' => 'Ny butik',
        'edit_item' => 'Redigera butik',
        'view_item' => 'Visa butik',
        'all_items' => 'Alla butiker',
        'search_items' => 'Sök bland butiker',
        'not_found' => 'Inga butiker hittades',
        'not_found_in_trash' => 'Inga butiker hittades i papperskorgen',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'butiker'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('stores', $args);
}

add_action('init', 'create_store_post_type');

add_filter('woocommerce_show_page_title', 'bbloomer_hide_shop_page_title');

function bbloomer_hide_shop_page_title($title)
{
    if (is_shop())
        $title = false;
    return $title;
}