<?php

// Require Package Collection
require_once get_template_directory() . '/includes/Package.php';

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

    // Enqueue packages React app
    if (is_page('packages')) {
        $asset_file = get_template_directory() . '/apps/packages/build/index.asset.php';

        if (file_exists($asset_file)) {
            $asset = require $asset_file;

            wp_enqueue_script(
                'arcwp-packages-app',
                get_template_directory_uri() . '/apps/packages/build/index.js',
                $asset['dependencies'],
                $asset['version'],
                true
            );

            // Localize script with API settings
            wp_localize_script('arcwp-packages-app', 'arcwpPackages', [
                'apiUrl' => rest_url(),
                'nonce' => wp_create_nonce('wp_rest')
            ]);
        }
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

// Register Package Collection
add_action('init', function() {
    if (class_exists('Gateway\Plugin')) {
        \ARCWP\Package::register();
    }
});

// Create packages table on theme activation
add_action('after_switch_theme', function() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'gateway_packages';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        title varchar(255) NOT NULL,
        slug varchar(255) NOT NULL,
        type varchar(50) NOT NULL,
        summary varchar(500) NULL,
        description text NULL,
        version varchar(50) NULL,
        created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY  (id),
        UNIQUE KEY slug_unique (slug),
        KEY title_index (title),
        KEY type_index (type)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // Flush rewrite rules on theme activation
    flush_rewrite_rules();
});

// Add rewrite rules for packages routes
add_action('init', function() {
    // Add rewrite rule for /packages/{slug} to route to the packages page
    // This allows React Router to handle the slug parameter
    add_rewrite_rule(
        '^packages/([^/]+)/?$',
        'index.php?pagename=packages&package_slug=$matches[1]',
        'top'
    );
}, 10, 0);

// Add custom query var for package slug
add_filter('query_vars', function($vars) {
    $vars[] = 'package_slug';
    return $vars;
});

// Theme updater management
require_once get_template_directory() . '/updater/manage.php';
