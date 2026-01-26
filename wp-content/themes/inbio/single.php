<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package inbio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();

$rainbow_options = Rainbow_Helper::rainbow_get_options();
$rainbow_blog_sidebar_class = ($rainbow_options['rainbow_single_pos'] === 'full') || !is_active_sidebar('sidebar-1') ? 'col-lg-12 rainbow-post-wrapper' : 'col-lg-8 rainbow-post-wrapper';
?>
<!-- Start Blog Area  -->
<div class="rainbow-blog-area rn-section-gap">
    <div class="container">
        <div class="row row--40">
            <?php if (is_active_sidebar('sidebar-1') && $rainbow_options['rainbow_single_pos'] == 'left') { ?>
                <div class="col-lg-4 col-xl-4">
                    <aside class="rainbow-sidebar-area">
                        <?php dynamic_sidebar(); ?>
                    </aside>
                </div>
            <?php } ?>
            <div class="<?php echo esc_attr($rainbow_blog_sidebar_class); ?>">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content-single', get_post_type());
                endwhile; // End of the loop.
                ?>
            </div>
            <?php if (is_active_sidebar('sidebar-1') && $rainbow_options['rainbow_single_pos'] == 'right') { ?>
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