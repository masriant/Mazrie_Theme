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
                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; endif; ?>
        </main>
        
        <?php if (is_active_sidebar('sidebar-right')) : ?>
        <aside class="sidebar">
            <?php get_sidebar('right'); ?>
        </aside>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
