</div>
<footer class="footer">
    <div class="footer-columns">
        <div class="footer-column">
            <?php if (is_active_sidebar('footer-column-1')) : ?>
                <?php dynamic_sidebar('footer-column-1'); ?>
            <?php endif; ?>
        </div>
        <div class="footer-column">
            <?php if (is_active_sidebar('footer-column-2')) : ?>
                <?php dynamic_sidebar('footer-column-2'); ?>
            <?php endif; ?>
        </div>
        <div class="footer-column">
            <?php if (is_active_sidebar('footer-column-3')) : ?>
                <?php dynamic_sidebar('footer-column-3'); ?>
            <?php endif; ?>
        </div>
        <div class="footer-column">
            <?php if (is_active_sidebar('footer-column-4')) : ?>
                <?php dynamic_sidebar('footer-column-4'); ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- <div class="footer-credit">
        </div>?php if (is_active_sidebar('footer-credit')) : ?>
            </footer>?php dynamic_sidebar('footer-credit'); ?>
        </?php endif; ?>
        <div class="footer-menu">
            </div>?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => 'footer-menu-items',
            ));
            ?>
        </div> -->
        <p>&copy; <?php echo date('Y'); ?> BIMTEKHUB. All Rights Reserved.</p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
