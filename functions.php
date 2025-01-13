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

// Fungsi untuk mendaftarkan sidebar
function bimtekhub_sidebars() {
    register_sidebar(array(
        'name' => 'Left Sidebar',
        'id' => 'sidebar-left',
        'description' => 'Sidebar kiri untuk tema BIMTEKHUB',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'Right Sidebar',
        'id' => 'sidebar-right',
        'description' => 'Sidebar kanan untuk tema BIMTEKHUB',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'bimtekhub_sidebars');

function bimtekhub_footer_widgets() {
    register_sidebar(array(
        'name' => 'Footer Column 1',
        'id' => 'footer-column-1',
        'description' => 'Widget area for footer column 1',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Column 2',
        'id' => 'footer-column-2',
        'description' => 'Widget area for footer column 2',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Column 3',
        'id' => 'footer-column-3',
        'description' => 'Widget area for footer column 3',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Column 4',
        'id' => 'footer-column-4',
        'description' => 'Widget area for footer column 4',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
     ));
    register_sidebar(array(
        'name' => 'Footer Credit',
        'id' => 'footer-credit',
        'description' => 'Widget area for footer credit',
        'before_widget' => '<div class="footer-credit-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'bimtekhub_footer_widgets');


