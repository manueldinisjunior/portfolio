<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package inbio
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();
$rainbow_options = Rainbow_Helper::rainbow_get_options(); ?>
<div class="rbt-elements-area rn-section-gap">
    <div class="error-area">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-10">
                    <?php if (!empty($rainbow_options['rainbow_404_title'])) { ?> <h1
                            class="title"><?php echo esc_html($rainbow_options['rainbow_404_title']); ?></h1> <?php } ?>
                    <?php if (!empty($rainbow_options['rainbow_404_subtitle'])) { ?>  <h3
                            class="sub-title"><?php echo esc_html($rainbow_options['rainbow_404_subtitle']); ?></h3> <?php } ?>
                    <?php if (!empty($rainbow_options['rainbow_404_content'])) { ?>
                        <p><?php echo esc_html($rainbow_options['rainbow_404_content']); ?></p> <?php } ?>

                    <?php if ($rainbow_options['rainbow_enable_go_back_btn'] !== "no") { ?>
                        <a class="rn-btn"
                           href="<?php echo esc_url(home_url('/')); ?>"><span><?php echo esc_html($rainbow_options['rainbow_button_text']); ?></span></a>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div><!-- End Error Area  -->
<?php get_footer();