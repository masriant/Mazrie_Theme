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
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@400;700&display=swap', false);
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), null, true);
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

function bimtekhub_customize_register($wp_customize) {
    // Add Typography Section
    $wp_customize->add_section('bimtekhub_typography', array(
        'title' => __('Typography', 'bimtekhub-theme'),
        'priority' => 30,
    ));

    // Add Font Family Setting for Body
    $wp_customize->add_setting('bimtekhub_body_font_family', array(
        'default' => 'Arial, sans-serif',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_body_font_family', array(
        'label' => __('Body Font Family', 'bimtekhub-theme'),
        'section' => 'bimtekhub_typography',
        'type' => 'select',
        'choices' => array(
            'Arial, sans-serif' => 'Arial',
            'Roboto, sans-serif' => 'Roboto',
            'Poppins, sans-serif' => 'Poppins',
        ),
    ));

    // Add Font Family Setting for Headings
    $headings = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6');
    foreach ($headings as $heading) {
        $wp_customize->add_setting("bimtekhub_{$heading}_font_family", array(
            'default' => 'Arial, sans-serif',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("bimtekhub_{$heading}_font_family", array(
            'label' => strtoupper($heading) . ' Font Family',
            'section' => 'bimtekhub_typography',
            'type' => 'select',
            'choices' => array(
                'Arial, sans-serif' => 'Arial',
                'Roboto, sans-serif' => 'Roboto',
                'Poppins, sans-serif' => 'Poppins',
            ),
        ));
    }

    // Add Header Settings Section
    $wp_customize->add_section('bimtekhub_header', array(
        'title' => __('Header Settings', 'bimtekhub-theme'),
        'priority' => 20,
    ));

    // Add Header Title Position Setting
    $wp_customize->add_setting('bimtekhub_header_title_position', array(
        'default' => 'center',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_header_title_position', array(
        'label' => __('Header Title Position', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'select',
        'choices' => array(
            'left' => 'Left',
            'center' => 'Center',
            'right' => 'Right',
        ),
    ));

    // Add Header Title Visibility Setting
    $wp_customize->add_setting('bimtekhub_header_title_visibility', array(
        'default' => 'on',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_header_title_visibility', array(
        'label' => __('Show Header Title', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'checkbox',
    ));

    // Add Menu Position Setting
    $wp_customize->add_setting('bimtekhub_menu_position', array(
        'default' => 'below',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_menu_position', array(
        'label' => __('Menu Position', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'select',
        'choices' => array(
            'above' => 'Above Title',
            'below' => 'Below Title',
        ),
    ));

    // Add Menu Alignment Setting
    $wp_customize->add_setting('bimtekhub_menu_alignment', array(
        'default' => 'center',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_menu_alignment', array(
        'label' => __('Menu Alignment', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'select',
        'choices' => array(
            'left' => 'Left',
            'center' => 'Center',
            'right' => 'Right',
        ),
    ));

    // Add Header Title Font Size Setting
    $wp_customize->add_setting('bimtekhub_header_title_font_size', array(
        'default' => '36px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_header_title_font_size', array(
        'label' => __('Header Title Font Size', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'text',
    ));

    // Add Header Description Font Size Setting
    $wp_customize->add_setting('bimtekhub_header_description_font_size', array(
        'default' => '16px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_header_description_font_size', array(
        'label' => __('Header Description Font Size', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'text',
    ));

    // Add Menu Font Size Setting
    $wp_customize->add_setting('bimtekhub_menu_font_size', array(
        'default' => '16px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_menu_font_size', array(
        'label' => __('Menu Font Size', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'text',
    ));

    // Add Menu Item Spacing Setting
    $wp_customize->add_setting('bimtekhub_menu_item_spacing', array(
        'default' => '10px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_menu_item_spacing', array(
        'label' => __('Menu Item Spacing', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'text',
    ));
}
add_action('customize_register', 'bimtekhub_customize_register');

// Enqueue customizer styles
function bimtekhub_customizer_css() {
    ?>
    <style type="text/css">
        body {
            font-family: <?php echo get_theme_mod('bimtekhub_body_font_family', 'Arial, sans-serif'); ?>;
        }
        h1 {
            font-family: <?php echo get_theme_mod('bimtekhub_h1_font_family', 'Arial, sans-serif'); ?>;
        }
        h2 {
            font-family: <?php echo get_theme_mod('bimtekhub_h2_font_family', 'Arial, sans-serif'); ?>;
        }
        h3 {
            font-family: <?php echo get_theme_mod('bimtekhub_h3_font_family', 'Arial, sans-serif'); ?>;
        }
        h4 {
            font-family: <?php echo get_theme_mod('bimtekhub_h4_font_family', 'Arial, sans-serif'); ?>;
        }
        h5 {
            font-family: <?php echo get_theme_mod('bimtekhub_h5_font_family', 'Arial, sans-serif'); ?>;
        }
        h6 {
            font-family: <?php echo get_theme_mod('bimtekhub_h6_font_family', 'Arial, sans-serif'); ?>;
        }
        .header-title,
        .header-description {
            text-align: <?php echo get_theme_mod('bimtekhub_header_title_position', 'center'); ?>;
            display: <?php echo get_theme_mod('bimtekhub_header_title_visibility', 'on') ? 'block' : 'none'; ?>;
        }
        .header-title {
            font-size: <?php echo get_theme_mod('bimtekhub_header_title_font_size', '36px'); ?>;
        }
        .header-description {
            font-size: <?php echo get_theme_mod('bimtekhub_header_description_font_size', '16px'); ?>;
        }
        .menu {
            text-align: <?php echo get_theme_mod('bimtekhub_menu_alignment', 'center'); ?>;
            font-size: <?php echo get_theme_mod('bimtekhub_menu_font_size', '16px'); ?>;
        }
        .menu-item {
            margin-right: <?php echo get_theme_mod('bimtekhub_menu_item_spacing', '10px'); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'bimtekhub_customizer_css');


