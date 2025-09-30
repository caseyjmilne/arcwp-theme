<?php

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'arcwp-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style(
        'arcwp-tailwind',
        get_template_directory_uri() . '/tailwind/output.css',
        [],
        wp_get_theme()->get('Version')
    );
});

// Add theme support for menus and features
add_action('after_setup_theme', function() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'arcwp'),
    ));
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats');
    add_theme_support('title-tag');
});


// Add to functions.php temporarily to debug
add_action('admin_notices', function() {
    if (current_theme_supports('post-thumbnails')) {
        echo '<div class="notice notice-success"><p>Post thumbnails ARE supported</p></div>';
    } else {
        echo '<div class="notice notice-error"><p>Post thumbnails NOT supported</p></div>';
    }
});
