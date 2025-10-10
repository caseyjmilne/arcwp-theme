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

    // Enqueue home page animations as ES6 module (only on homepage)
    // The module imports anime.js directly, so we don't need to enqueue it separately
    if (is_front_page() || is_page_template('page-home.php')) {
        wp_enqueue_script(
            'arcwp-home-animations',
            get_template_directory_uri() . '/js/home-animations.js',
            [], // No dependencies - module imports anime.js itself
            wp_get_theme()->get('Version'),
            true
        );

        // Add type="module" attribute to the script tag
        add_filter('script_loader_tag', function($tag, $handle) {
            if ('arcwp-home-animations' === $handle) {
                $tag = str_replace('<script ', '<script type="module" ', $tag);
            }
            return $tag;
        }, 10, 2);
    }
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
require_once get_template_directory() . '/updater/manage.php';