<?php

//Disable woocommerce stylesheet
/* add_filter('woocommerce_enqueue_styles', '__return_empty_array'); */

//Declare Woocommerce support
function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


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

        $html_pageLink = '<div class="container-fluid">
        <form id="searchbar" class="d-flex input-group w-auto">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Sök...">
                <button type="button" class="btn btn-secondary">
                    <i class="fa fa-search"></i></i>
                </button>
            </div>
        </form>
    </div>
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



//Register options pages
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(
        array(
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Temainställningar',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => 'Theme Header Settings',
            'menu_title' => 'Header',
            'parent_slug' => 'theme-general-settings',
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




//Register blocks

add_action('acf/init', 'my_acf_init');
function my_acf_init()
{

    // check function exists
    if (function_exists('acf_register_block')) {

        // register a testimonial block
        acf_register_block(
            array(
                'name' => 'testimonial',
                'title' => __('Testimonial'),
                'description' => __('A custom testimonial block.'),
                'render_callback' => 'my_acf_block_render_callback',
                'category' => 'formatting',
                'icon' => 'admin-comments',
                'keywords' => array('testimonial', 'quote'),
            )
        );
    }
}