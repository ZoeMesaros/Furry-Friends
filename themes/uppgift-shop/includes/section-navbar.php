<?php
$pageLink = get_field('my_page_link');
$linkTitle = get_field('my_page_title');
?>

<div class="px-0.5">
    <div class="p-5 text-center bg-image rounded-3" id="heroimg" style="
    background-image: url('http://localhost/furryfriends/wordpress/wp-content/uploads/2023/10/banner-slimmer.png');
    center center no-repeat;
  ">
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img class="navbar-img" src="<?php echo get_field('logo', 'option'); ?>" height="90" alt="CoolBrand">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">

                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'top-menu'
                    )
                ) ?>
                <div class="container-fluid">
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
                    <a href="<?php echo get_field('my_page_link', 'option'); ?>" class="nav-item nav-link">
                        <?php echo get_field('my_page_link', 'option'); ?>
                    </a>
                </div>
            </div>

        </div>
    </nav>
</div>