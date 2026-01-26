<?php
/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inbio
 */

// Get Value
$rainbow_options = Rainbow_Helper::rainbow_get_options();
$rainbow_footer_bottom_menu_args = Rainbow_Helper::rainbow_footer_bottom_menu_args();
$lineclass = (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) ? "rn-section-gapTop section-separator" : "";
$allowed_tags = wp_kses_allowed_html('post');
$footerlogo = empty($rainbow_options['rainbow_footer_logo']['url']) ? Rainbow_Helper::get_img('logo.png') : $rainbow_options['rainbow_footer_logo']['url'];
$rainbow_socials = Rainbow_Helper::rainbow_socials();
?>
<footer class="footer-area">
    <div id="footer" class="rn-footer-area footer-style-2 <?php echo esc_attr($lineclass); ?>">
        <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) { ?>
            <div class="container pb--80 pb_sm--40 plr_sm--20">
                <div class="row">
                    <?php if (is_active_sidebar('footer-1')) { ?>
                        <div class="col-xl-3 col-12 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="ft-widget-list-wrapper">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (is_active_sidebar('footer-2')) { ?>
                        <div class="col-sl-3 col-12 mt_sm--20 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="ft-widget-list-wrapper">
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (is_active_sidebar('footer-1')) { ?>
                        <div class="col-sl-3 col-12 mt_sm--20 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="ft-widget-list-wrapper">
                                <?php dynamic_sidebar('footer-3'); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (is_active_sidebar('footer-4')) { ?>
                        <div class="col-sl-3 col-12 mt_sm--20 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="ft-widget-list-wrapper">
                                <?php dynamic_sidebar('footer-4'); ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php if (!empty($rainbow_options['rainbow_copyright_contact']) || !empty($rainbow_options['rainbow_footer_footerbottom'])) { ?>
            <div class="copyright text-center ptb--40 section-separator">
                <p class="description"><?php echo do_shortcode($rainbow_options['rainbow_copyright_contact'], $allowed_tags); ?></p>
            </div>
        <?php } ?>
    </div>
</footer>
