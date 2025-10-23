<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body class="bg-white text-gray-900 dark:bg-zinc-950 dark:text-zinc-300">
<?php wp_body_open(); ?>

<?php require_once get_template_directory() . '/templates/site-header.php'; ?>