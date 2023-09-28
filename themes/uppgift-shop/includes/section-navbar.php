<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <img class="navbar-img" src="<?php echo get_field('logo', 'option'); ?>" alt="">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'nav-menu'
                    )
                ) ?>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="#" class="nav-item nav-link">Logga in</a>
            </div>
        </div>
    </div>
    <br>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Sök här.." aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Sök</button>
    </form>
</nav>