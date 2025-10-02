<?php

// Register Package Custom Post Type
add_action('init', function() {
    register_post_type('package', array(
        'labels' => array(
            'name' => __('Packages', 'arcwp'),
            'singular_name' => __('Package', 'arcwp'),
            'add_new' => __('Add New Package', 'arcwp'),
            'add_new_item' => __('Add New Package', 'arcwp'),
            'edit_item' => __('Edit Package', 'arcwp'),
            'new_item' => __('New Package', 'arcwp'),
            'view_item' => __('View Package', 'arcwp'),
            'search_items' => __('Search Packages', 'arcwp'),
            'not_found' => __('No packages found', 'arcwp'),
            'not_found_in_trash' => __('No packages found in trash', 'arcwp'),
            'all_items' => __('All Packages', 'arcwp'),
            'menu_name' => __('Packages', 'arcwp'),
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-archive',
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'packages'),
        'capability_type' => 'post',
    ));
});
