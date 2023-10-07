<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part('content', 'post', [
            'postImg' => get_field('post_image'),
            'postDescription' => get_field('post_description'),
            'postLink' => get_field('post_link'),
            'postCategory' => get_field('post_category'),
            'contactTitle' => get_field('contact_page_title'),
        ]);
    endwhile;
else :
    echo 'No posts found.';
endif;
?>