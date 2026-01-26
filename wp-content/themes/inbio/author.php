<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inbio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();

$rainbow_options = Rainbow_Helper::rainbow_get_options();
$rainbow_blog_sidebar_class = ($rainbow_options['rainbow_blog_sidebar'] === 'no') || !is_active_sidebar('sidebar-1') ? 'col-lg-12 inbio-post-wrapper' : 'col-lg-8 inbio-post-wrapper';
?>
<!-- Start Blog Area  -->
<div class="rainbow-blog-area rn-section-gap">
    <div class="container">
        <div class="row row--40">
            <?php if (is_active_sidebar('sidebar-1') && $rainbow_options['rainbow_blog_sidebar'] == 'left') { ?>
                <div class="col-lg-4 col-xl-4 ">
                    <aside class="rainbow-sidebar-area"> 
                        <?php dynamic_sidebar(); ?> 
                    </aside>
                </div>
            <?php } ?>
            <div class="<?php echo esc_attr($rainbow_blog_sidebar_class); ?>">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title pt--30">
                            <h2 class="title"><?php esc_html_e('Articles By This Author', 'inbio') ?></h2>
                        </div>
                    </div>
                </div> 
                <?php
                if (have_posts()) :

                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /*
                            * Include the Post-Format-specific template for the content.
                            * If you want to override this in a child theme, then include a file
                            * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                            */
                        get_template_part('template-parts/post/content', get_post_format());

                    endwhile;
                    rainbow_blog_pagination(); 
                else :
                    get_template_part('template-parts/content', 'none'); 
                endif;
                ?>
            </div>
            <?php if (is_active_sidebar('sidebar-1') && $rainbow_options['rainbow_blog_sidebar'] == 'right') { ?>
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