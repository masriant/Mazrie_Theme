<?php get_header(); ?>

<div class="container">
    <div class="main-content">
        <main class="content-area">
            <h1>Popular Posts</h1>
            <?php
            // Query untuk mendapatkan postingan populer
            $popular_posts = new WP_Query(array(
                'posts_per_page' => 10,
                'orderby' => 'comment_count',
                'order' => 'DESC'
            ));
            ?>
            <?php if ($popular_posts->have_posts()) : ?>
                <div class="list-group">
                    <?php while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1" style="color: #0073aa;"><?php the_title(); ?></h5>
                                <small><?php the_time('F j, Y'); ?></small>
                            </div>
                            <p class="mb-1" style="color: #333;"><?php the_excerpt(); ?></p>
                            <small><?php the_author(); ?></small>
                        </a>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No popular posts found.</p>
            <?php endif; ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>
