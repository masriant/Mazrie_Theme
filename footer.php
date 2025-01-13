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
    <div class="footer-credit">
        <?php if (is_active_sidebar('footer-credit')) : ?>
            <?php dynamic_sidebar('footer-credit'); ?>
        <?php endif; ?>
        <div class="footer-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => 'footer-menu-items',
            ));
            ?>
        </div>
        <p>&copy; <?php echo date('Y'); ?> BIMTEKHUB. All Rights Reserved.</p>
    </div>
</footer>
<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
