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
        <!-- <div class="additional-content"> -->
        <!-- </div>?php get_template_part('popular'); ?> -->
        <!-- </div>?php get_template_part('trending'); ?> -->

        <!-- Popular and Trending Posts Section -->
 <section class="popular-trending">
            <div class="content-wrapper">
                <h2>Popular & Trending Posts</h2>
                <div class="row">
                    <!-- Popular Posts -->
                    <div class="col-md-6">
                        <div class="popular-posts">
                            <h3>Popular Posts</h3>
                            <?php get_template_part('popular'); ?>
                        </div>
                    </div>
                    <!-- Trending Posts -->
                    <div class="col-md-6">
                        <div class="trending-posts">
                            <h3>Trending Posts</h3>
                            <?php get_template_part('trending'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                
            </div>
        
        <?php if (is_active_sidebar('sidebar-right')) : ?>
            <aside class="sidebar">
                <?php get_sidebar('right'); ?>
            </aside>
            <?php endif; ?>
            
        </div>
</div>

<?php get_footer(); ?>
