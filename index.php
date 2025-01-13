<?php get_header(); ?>

<div class="container">
    <div class="main-content">
        <!-- Konten Utama -->
        <main class="content-area">
            <h2>Terbaru</h2>
            <?php if (have_posts()) : ?>
                <div class="list-group">
                    <?php while (have_posts()) : the_post(); ?>
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1" style="color: #0073aa;"><?php the_title(); ?></h5>
                                <small><?php the_time('F j, Y'); ?></small>
                            </div>
                            <p class="mb-1" style="color: #333;"><?php the_excerpt(); ?></p>
                            <small><?php the_author(); ?></small>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p>Belum ada postingan.</p>
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
        </main>

        <!-- Sidebar Kiri -->
        <?php if (is_active_sidebar('sidebar-left')) : ?>
        <aside class="sidebar sidebar-left">
            <?php get_sidebar('left'); ?>
        </aside>
        <?php endif; ?>

        <!-- Sidebar Kanan -->
        <?php if (is_active_sidebar('sidebar-right')) : ?>
        <aside class="sidebar sidebar-right">
            <?php get_sidebar('right'); ?>
        </aside>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
