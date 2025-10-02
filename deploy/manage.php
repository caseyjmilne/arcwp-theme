<?php

/*
 *
 * Plugin Updater Integration
 * https://github.com/YahnisElsts/plugin-update-checker
 *
 */

require get_template_directory() . '/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

PucFactory::buildUpdateChecker(
	'http://arcwp.ca/release/arcwp-theme/latest.json',
	get_template_directory() . '/functions.php',
	'arcwp-theme'
);
