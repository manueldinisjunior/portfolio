<?php
/**
 * The template for displaying megamenu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package inbio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$rainbow_options = Rainbow_Helper::rainbow_get_options();
$thumb_size = ($rainbow_options['rainbow_single_project_pos'] === 'full') ? 'rainbow-thumbnail-single' : 'rainbow-thumbnail-archive';
$rainbow_project_sidebar_class = ($rainbow_options['rainbow_single_project_pos'] === 'full') || !is_active_sidebar('sidebar-1') ? 'col-lg-12 rainbow-post-wrapper' : 'col-lg-8 rainbow-post-wrapper';

get_header(); ?>
    <!-- Start Blog Area  -->
    <div class="rainbow-blog-area rn-section-gap">
        <div class="container">
            <div class="row row--40">
                <?php if (is_active_sidebar('sidebar-1') && $rainbow_options['rainbow_single_project_pos'] == 'left') { ?>
                    <div class="col-lg-4 col-xl-4">
                        <aside class="rainbow-sidebar-area">
                            <?php dynamic_sidebar(); ?>
                        </aside>
                    </div>
                <?php } ?>
                <div class="<?php echo esc_attr($rainbow_project_sidebar_class); ?>">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content-single-project', get_post_type());
                    endwhile; // End of the loop.
                    ?>
                </div>
                <?php if (is_active_sidebar('sidebar-1') && $rainbow_options['rainbow_single_project_pos'] == 'right') { ?>
                    <div class="col-lg-4 col-xl-4">
                        <aside class="rainbow-sidebar-area">

                            <?php dynamic_sidebar(); ?>

                        </aside>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Blog Area  -->
<?php
get_footer();