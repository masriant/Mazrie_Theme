<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(get_theme_mod('bimtekhub_sidebar_layout', 'left-content-right')); ?>>
<header class="header <?php echo 'align-' . get_theme_mod('bimtekhub_header_title_position', 'left') . ' ' . (get_theme_mod('bimtekhub_header_menu_position_type', 'static') === 'fixed' ? 'fixed' : ''); ?>">
    <?php if (get_theme_mod('bimtekhub_menu_position', 'below') === 'above') : ?>
        <nav class="main-navigation">
            <?php get_template_part('menu'); ?>
        </nav>
    <?php endif; ?>
    <?php if (get_theme_mod('bimtekhub_header_title_visibility', 'on')) : ?>
        <div class="header-content">
            <?php if (get_theme_mod('bimtekhub_header_image', '')) : ?>
                <img src="<?php echo esc_url(get_theme_mod('bimtekhub_header_image')); ?>" alt="<?php bloginfo('name'); ?>">
            <?php else : ?>
                <h1 class="header-title"><?php bloginfo('name'); ?></h1>
                <p class="header-description"><?php bloginfo('description'); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if (get_theme_mod('bimtekhub_menu_position', 'below') === 'below') : ?>
        <nav class="main-navigation">
            <?php get_template_part('menu'); ?>
        </nav>
    <?php endif; ?>
    <button class="menu-toggle">☰ Menu</button>
</header>
<?php wp_footer(); ?>
</body>
</html>
