<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Furry Friends</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>" type="text/css" />
    <script src="https://kit.fontawesome.com/b3674b136c.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>

<body>
    <?php get_template_part('includes/section', 'navbar'); ?>