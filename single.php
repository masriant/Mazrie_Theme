<?php get_header(); ?>

<div class="container">
    <div class="main-content">
        <?php if (is_active_sidebar('sidebar-left')) : ?>
        <aside class="sidebar">
            <?php get_sidebar('left'); ?>
        </aside>
        <?php endif; ?>
        
        <main class="content-area">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                    <h1><?php the_title(); ?></h1>
                    <div class="tabs">
                        <ul class="tab-menu">
                            <li class="tab active" data-tab="content">Content</li>
                            <li class="tab" data-tab="comments">Comments</li>
                            <li class="tab" data-tab="related">Related</li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-panel active" id="content">
                                <?php the_content(); ?>
                            </div>
                            <div class="tab-panel" id="comments">
                                <?php comments_template(); ?>
                            </div>
                            <div class="tab-panel" id="related">
                                <?php
                                // Tampilkan post terkait
                                $related_posts = new WP_Query(array(
                                    'category__in' => wp_get_post_categories($post->ID),
                                    'posts_per_page' => 3,
                                    'post__not_in' => array($post->ID)
                                ));
                                if ($related_posts->have_posts()) : ?>
                                    <div class="list-group">
                                        <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
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
                                    <p>No related posts found.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile; else : ?>
                <p>No posts found.</p>
            <?php endif; ?>
            <div class="pagination">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php
                        $pagination_links = paginate_links(array(
                            'type' => 'array',
                            'prev_text' => 'Previous',
                            'next_text' => 'Next',
                        ));
                        if ($pagination_links) {
                            foreach ($pagination_links as $link) {
                                $active_class = strpos($link, 'current') !== false ? ' active' : '';
                                echo '<li class="page-item' . $active_class . '">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <?php get_template_part('trending'); ?>
            <?php get_template_part('popular'); ?>
        </main>
        
        <?php if (is_active_sidebar('sidebar-right')) : ?>
        <aside class="sidebar">
            <?php get_sidebar('right'); ?>
        </aside>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
