<nav class="menu <?php echo 'align-' . get_theme_mod('bimtekhub_menu_alignment', 'center'); ?>">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'container' => false,
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    ));
    ?>
</nav>