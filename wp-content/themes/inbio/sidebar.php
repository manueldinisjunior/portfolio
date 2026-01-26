<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package inbio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>
<div id="inbio-blog-sidebar" class="widget-area inbio-blog-sidebar">
    <?php dynamic_sidebar('sidebar-1');?>
</div><!-- #secondary -->