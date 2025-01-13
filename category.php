<?php get_header(); ?>

<div class="container">
    <div class="main-content">
        <?php if (is_active_sidebar('sidebar-left')) : ?>
        <aside class="sidebar">
            <?php get_sidebar('left'); ?>
        </aside>
        <?php endif; ?>
        
        <main class="content-area">
            <h1><?php single_cat_title(); ?></h1>
            <?php if (category_description()) : ?>
                <div class="category-description">
                    <?php echo category_description(); ?>
                </div>
            <?php endif; ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="post">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; else : ?>
                <p>No posts found in this category.</p>
            <?php endif; ?>
            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>
        </main>
        
        <?php if (is_active_sidebar('sidebar-right')) : ?>
        <aside class="sidebar">
            <?php get_sidebar('right'); ?>
        </aside>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
