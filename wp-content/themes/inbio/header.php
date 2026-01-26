<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package inbio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class('inbio-drag-drop-custom'); ?>>
<?php
$rainbow_options = Rainbow_Helper::rainbow_get_options();
if (function_exists('wp_body_open')) {
    wp_body_open();
}

?>
<div id="main-wrapper" class="main-wrapper">
    <?php get_template_part('template-parts/header/header', 'main');