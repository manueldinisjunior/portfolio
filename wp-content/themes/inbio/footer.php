<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package inbio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>
</main><!-- End Page Wrapper -->
<?php
$rainbow_options = Rainbow_Helper::rainbow_get_options();
$footer_layout = Rainbow_Helper::rainbow_footer_layout();
$footer_area = $footer_layout['footer_area'];

if ("no" !== $footer_area && "0" !== $footer_area) {
    get_template_part('template-parts/footer/footer', $footer_layout['footer_style']);
}
$innto_video_enable  = (isset($rainbow_options['rainbow_enable_intro_video'])) ? $rainbow_options['rainbow_enable_intro_video'] : 'no';
if ($innto_video_enable !== 'no') {
    get_template_part('template-parts/intro-video'); // Get intro video template
}

$back_to_top_position  = (isset($rainbow_options['rainbow_scroll_to_top_position'])) ? $rainbow_options['rainbow_scroll_to_top_position'] : 'right';

if ($rainbow_options['rainbow_scroll_to_top_enable'] !== 'no') { ?>
    <div class="backto-top position-<?php echo esc_attr($back_to_top_position); ?>"><!-- Back to  top Start -->
        <div>
            <i class="feather-arrow-up"></i>
        </div>
    </div><!-- Back to top end -->
<?php } ?>
</div>
<?php wp_footer(); ?>
</body>
</html>