<?php

namespace ARCWP;

/**
 * Package Database Manager
 *
 * Handles database table creation for packages collection
 */
class PackageDatabase
{
    /**
     * Install the packages table
     *
     * @return void
     */
    public static function install()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'packages';
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
    }
}
