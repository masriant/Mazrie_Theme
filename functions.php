<?php
// Tambahkan dukungan untuk thumbnail
add_theme_support('post-thumbnails');

// Daftarkan menu navigasi
function bimtekhub_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'bimtekhub-theme'),
        'footer-menu' => __('Footer Menu', 'bimtekhub-theme'),
    ));
}
add_action('init', 'bimtekhub_menus');

// Enqueue stylesheet dan script
function bimtekhub_enqueue_assets() {
    wp_enqueue_style('bimtekhub-style', get_stylesheet_uri());
    wp_enqueue_script('bimtekhub-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'bimtekhub_enqueue_assets');

function bimtekhub_sidebars() {
    register_sidebar(array(
        'name' => 'Left Sidebar',
        'id' => 'sidebar-left',
    ));
    register_sidebar(array(
        'name' => 'Right Sidebar',
        'id' => 'sidebar-right',
    ));
}
add_action('widgets_init', 'bimtekhub_sidebars');
