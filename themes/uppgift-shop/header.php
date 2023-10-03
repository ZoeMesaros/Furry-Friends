<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>
        <?php wp_title(); ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b3674b136c.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class('test'); ?>>
    <?php get_template_part('includes/section', 'navbar'); ?>