<?php
/* Custom search form */
?>
<div class="container-fluid">
    <form role="search" id="searchbar" class="d-flex input-group w-auto" method="get"
        action="<?php echo esc_url(home_url('/butik')); ?>">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Sök efter en produkt..." name="s">
            <button type="submit" class="btn btn-secondary">
                <i class="fa fa-search"></i></i>
            </button>
        </div>
    </form>
</div>