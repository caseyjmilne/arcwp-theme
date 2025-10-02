<?php

// Require Package CPT Support
require_once get_template_directory() . '/includes/packages/package-post-type.php';
require_once get_template_directory() . '/includes/packages/package-fields.php';

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'arcwp-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style(
        'arcwp-tailwind',
        get_template_directory_uri() . '/tailwind.css',
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
    add_theme_support('title-tag');
});

// Theme updater management
require_once get_template_directory() . '/deploy/manage.php';