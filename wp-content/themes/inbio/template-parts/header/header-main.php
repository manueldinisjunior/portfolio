<?php
/**
 * Template part for displaying main header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inbio
 */
$rainbow_options = Rainbow_Helper::rainbow_get_options();
$header_layout = Rainbow_Helper::rainbow_header_layout();
$header_area = $header_layout['header_area'];
$header_style = $header_layout['header_style'];
$wrapper = (empty($header_style) || $header_style == "2") ? 'page-wrapper-two' : '';
if ("no" !== $header_area && "0" !== $header_area) {
    get_template_part('template-parts/header/header', $header_style);
} ?>
<!-- Start Page Wrapper -->
<main class="main-page-wrapper <?php echo esc_attr($wrapper); ?>">
<?php
if (!is_404() && !is_singular("elementor_library")) {
    get_template_part('template-parts/content-banner');
}
?>
