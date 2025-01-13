<?php get_header(); ?>

<div class="main-content">
    <aside class="sidebar">
        <?php get_sidebar('left'); ?>
    </aside>
    <main class="content-area">
        <h2>Populer</h2>
        <?php // Query untuk menampilkan post populer ?>
        <h2>Trending</h2>
        <?php // Query untuk menampilkan post trending ?>
        <h2>Terbaru</h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
            </article>
        <?php endwhile; endif; ?>
    </main>
    <aside class="sidebar">
        <?php get_sidebar('right'); ?>
    </aside>
</div>

<?php get_footer(); ?>
