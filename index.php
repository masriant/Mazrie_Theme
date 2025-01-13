<?php get_header(); ?>

<div class="container">
    <div class="main-content">
        <!-- Konten Utama -->
        <main class="content-area">
            <h2>Terbaru</h2>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="post">
                    <h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
                    <p><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile; else : ?>
                <p>Belum ada postingan.</p>
            <?php endif; ?>
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
