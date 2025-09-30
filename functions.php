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

// Add theme support for menus
add_action('after_setup_theme', function() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'arcwp'),
    ));
});

