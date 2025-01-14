<?php
// Tambahkan dukungan untuk thumbnail
add_theme_support('post-thumbnails');

// Daftarkan menu navigasi
if (!function_exists('bimtekhub_menus')) {
    function bimtekhub_menus() {
        register_nav_menus(array(
            'header-menu' => __('Header Menu', 'bimtekhub-theme'),
            'footer-menu' => __('Footer Menu', 'bimtekhub-theme'),
        ));
    }
}
add_action('init', 'bimtekhub_menus');

// Enqueue stylesheet dan script
if (!function_exists('bimtekhub_enqueue_assets')) {
    function bimtekhub_enqueue_assets() {
        $theme_version = wp_get_theme()->get('Version');
        wp_enqueue_style('bimtekhub-style', get_stylesheet_uri(), array(), $theme_version);
        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), $theme_version);
        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@400;700&display=swap', false);
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('bimtekhub-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), $theme_version, true);
    }
}
add_action('wp_enqueue_scripts', 'bimtekhub_enqueue_assets');

// Fungsi untuk mendaftarkan sidebar
if (!function_exists('bimtekhub_sidebars')) {
    function bimtekhub_sidebars() {
        register_sidebar(array(
            'name' => __('Left Sidebar', 'bimtekhub-theme'),
            'id' => 'sidebar-left',
            'description' => __('Sidebar kiri untuk tema BIMTEKHUB', 'bimtekhub-theme'),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('Right Sidebar', 'bimtekhub-theme'),
            'id' => 'sidebar-right',
            'description' => __('Sidebar kanan untuk tema BIMTEKHUB', 'bimtekhub-theme'),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }
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
        'default' => 'left',
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
        'default' => 'right',
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

    // Add Header and Menu Position On/Off Setting
    $wp_customize->add_setting('bimtekhub_header_menu_position_toggle', array(
        'default' => 'on',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_header_menu_position_toggle', array(
        'label' => __('Enable Header and Menu Position', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'checkbox',
    ));

    // Add Header and Menu Position Type Setting
    $wp_customize->add_setting('bimtekhub_header_menu_position_type', array(
        'default' => 'Sticky',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_header_menu_position_type', array(
        'label' => __('Header and Menu Position Type', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'select',
        'choices' => array(
            'static' => 'Static',
            'sticky' => 'Sticky',
            'fixed' => 'Fixed',
        ),
    ));

    // Add Header Image Setting
    $wp_customize->add_setting('bimtekhub_header_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bimtekhub_header_image', array(
        'label' => __('Header Image', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'settings' => 'bimtekhub_header_image',
    )));

    // Add Header Background Image Setting
    $wp_customize->add_setting('bimtekhub_header_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bimtekhub_header_background_image', array(
        'label' => __('Header Background Image', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'settings' => 'bimtekhub_header_background_image',
    )));

    // Add Header Background Height Setting
    $wp_customize->add_setting('bimtekhub_header_background_height', array(
        'default' => '300px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_header_background_height', array(
        'label' => __('Header Background Height', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'text',
    ));

    // Add Header Content Margin Setting
    $wp_customize->add_setting('bimtekhub_header_content_margin', array(
        'default' => '20px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_header_content_margin', array(
        'label' => __('Header Content Margin', 'bimtekhub-theme'),
        'section' => 'bimtekhub_header',
        'type' => 'text',
    ));

    // Add Sidebar Layout Section
    $wp_customize->add_section('bimtekhub_sidebar_layout', array(
        'title' => __('Sidebar Layout', 'bimtekhub-theme'),
        'priority' => 40,
    ));

    // Add Sidebar Layout Setting
    $wp_customize->add_setting('bimtekhub_sidebar_layout', array(
        'default' => 'left-content-right',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bimtekhub_sidebar_layout', array(
        'label' => __('Sidebar Layout', 'bimtekhub-theme'),
        'section' => 'bimtekhub_sidebar_layout',
        'type' => 'select',
        'choices' => array(
            'left-content-right' => 'Sidebar Kiri - Konten - Sidebar Kanan',
            'content-left' => 'Konten - Sidebar Kiri',
            'content-right' => 'Konten - Sidebar Kanan',
            'fullwidth' => 'Konten (Fullwidth)',
        ),
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
            text-align: <?php echo get_theme_mod('bimtekhub_header_title_position', 'left'); ?>;
            display: <?php echo get_theme_mod('bimtekhub_header_title_visibility', 'on') ? 'block' : 'none'; ?>;
        }
        .header-title {
            font-size: <?php echo get_theme_mod('bimtekhub_header_title_font_size', '36px'); ?>;
        }
        .header-description {
            font-size: <?php echo get_theme_mod('bimtekhub_header_description_font_size', '16px'); ?>;
        }
        .menu {
            text-align: <?php echo get_theme_mod('bimtekhub_menu_alignment', 'right'); ?>;
            font-size: <?php echo get_theme_mod('bimtekhub_menu_font_size', '16px'); ?>;
        }
        .menu-item {
            margin-right: <?php echo get_theme_mod('bimtekhub_menu_item_spacing', '10px'); ?>;
        }
        .menu.align-left {
            justify-content: flex-start;
        }
        .menu.align-center {
            justify-content: center;
        }
        .menu.align-right {
            justify-content: flex-end;
        }
        .header,
        .menu {
            position: <?php echo get_theme_mod('bimtekhub_header_menu_position_type', 'Sticky'); ?>;
            top: 0;
            width: 100%;
            z-index: 1020;
        }
        .header.fixed {
            position: fixed;
        }
        .header {
            background-image: url('<?php echo get_theme_mod('bimtekhub_header_background_image', ''); ?>');
            background-size: cover;
            background-position: center;
            height: <?php echo get_theme_mod('bimtekhub_header_background_height', '300px'); ?>;
        }
        .header-content img {
            display: <?php echo get_theme_mod('bimtekhub_header_image', '') ? 'block' : 'none'; ?>;
            max-width: 100%;
            height: auto;
        }
        .main-content {
            padding-top: <?php echo get_theme_mod('bimtekhub_header_content_margin', '20px'); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'bimtekhub_customizer_css');

// Tambahkan tombol back to top
function bimtekhub_back_to_top() {
    ?>
    <a href="#" class="back-to-top">↑ Back to Top</a>
    <style type="text/css">
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            background: #0073aa;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }
        .back-to-top:hover {
            background: #005f8d;
        }
    </style>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var backToTop = document.querySelector('.back-to-top');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 100) {
                    backToTop.style.display = 'block';
                } else {
                    backToTop.style.display = 'none';
                }
            });
            backToTop.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'bimtekhub_back_to_top');

// Tambahkan dukungan untuk terjemahan
if (!function_exists('bimtekhub_theme_setup')) {
    function bimtekhub_theme_setup() {
        load_theme_textdomain('bimtekhub-theme', get_template_directory() . '/languages');
    }
}
add_action('after_setup_theme', 'bimtekhub_theme_setup');

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"submenu\">\n";
    }
}

// Add meta box for sidebar layout
function bimtekhub_add_sidebar_layout_meta_box() {
    add_meta_box(
        'bimtekhub_sidebar_layout_meta_box',
        __('Sidebar Layout', 'bimtekhub-theme'),
        'bimtekhub_sidebar_layout_meta_box_callback',
        array('post', 'page'),
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'bimtekhub_add_sidebar_layout_meta_box');

// Meta box callback function
function bimtekhub_sidebar_layout_meta_box_callback($post) {
    $sidebar_layout = get_post_meta($post->ID, '_bimtekhub_sidebar_layout', true);
    ?>
    <label for="bimtekhub_sidebar_layout"><?php _e('Select Sidebar Layout:', 'bimtekhub-theme'); ?></label>
    <select name="bimtekhub_sidebar_layout" id="bimtekhub_sidebar_layout" class="postbox">
        <option value="fullwidth" <?php selected($sidebar_layout, 'fullwidth'); ?>><?php _e('Default (Fullwidth)', 'bimtekhub-theme'); ?></option>
        <option value="content-right" <?php selected($sidebar_layout, 'content-right'); ?>><?php _e('Content - Sidebar Right', 'bimtekhub-theme'); ?></option>
        <option value="content-left" <?php selected($sidebar_layout, 'content-left'); ?>><?php _e('Content - Sidebar Left', 'bimtekhub-theme'); ?></option>
        <option value="left-content-right" <?php selected($sidebar_layout, 'left-content-right'); ?>><?php _e('Sidebar Left - Content - Sidebar Right', 'bimtekhub-theme'); ?></option>
    </select>
    <?php
}

// Save meta box data
function bimtekhub_save_sidebar_layout_meta_box_data($post_id) {
    if (array_key_exists('bimtekhub_sidebar_layout', $_POST)) {
        update_post_meta(
            $post_id,
            '_bimtekhub_sidebar_layout',
            $_POST['bimtekhub_sidebar_layout']
        );
    }
}
add_action('save_post', 'bimtekhub_save_sidebar_layout_meta_box_data');

// Add body class based on sidebar layout
function bimtekhub_add_sidebar_layout_body_class($classes) {
    if (is_singular('post') || is_singular('page')) {
        $sidebar_layout = get_post_meta(get_the_ID(), '_bimtekhub_sidebar_layout', true);
        if ($sidebar_layout) {
            $classes[] = $sidebar_layout;
        }
    }
    return $classes;
}
add_filter('body_class', 'bimtekhub_add_sidebar_layout_body_class');


