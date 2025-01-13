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
                                <?php // Tampilkan post terkait ?>
                            </div>
                        </div>
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
