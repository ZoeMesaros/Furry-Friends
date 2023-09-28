<?php

/**
 * Menu Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'menu-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'menu';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$text = get_field('menu') ?: 'Your menu here...';
$author = get_field('author') ?: 'Author name';
$role = get_field('role') ?: 'Author role';
$image = get_field('image') ?: 295;
$background_color = get_field('background_color');
$text_color = get_field('text_color');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <blockquote class="menu-blockquote">
        <span class="menu-text">
            <?php echo $text; ?>
        </span>
        <span class="menu-author">
            <?php echo $author; ?>
        </span>
        <span class="menu-role">
            <?php echo $role; ?>
        </span>
    </blockquote>
    <div class="menu-image">
        <?php echo wp_get_attachment_image($image, 'full'); ?>
    </div>
    <style type="text/css">
        #

        <?php echo $id; ?>
            {
            background:
                <?php echo $background_color; ?>
            ;
            color:
                <?php echo $text_color; ?>
            ;
        }
    </style>
</div>