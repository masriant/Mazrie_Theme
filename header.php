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
<body <?php body_class(); ?>>
<header class="header">
    <?php if (get_theme_mod('bimtekhub_menu_position', 'below') === 'above') : ?>
        <nav class="menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => false,
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ));
            ?>
        </nav>
    <?php endif; ?>
    <?php if (get_theme_mod('bimtekhub_header_title_visibility', 'on')) : ?>
        <h1 class="header-title"><?php bloginfo('name'); ?></h1>
        <p class="header-description"><?php bloginfo('description'); ?></p>
    <?php endif; ?>
    <?php if (get_theme_mod('bimtekhub_menu_position', 'below') === 'below') : ?>
        <nav class="menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => false,
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ));
            ?>
        </nav>
    <?php endif; ?>
    <button class="menu-toggle">☰ Menu</button>
</header>
