<?php get_header(); ?>

<section>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-5">
                    <?php if (have_posts()):
                        while (have_posts()):
                            the_post();
                            get_template_part('content', 'post', [
                                'postImg' => get_field('post_image'),
                                'postDescription' => get_field('post_description'),
                                'postCategory' => get_field('post_category'),
                                'postLink' => get_field('post_link'),
                            ]);
                        endwhile;
                    else:
                        echo 'No posts found.';
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
