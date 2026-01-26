<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inbio
 */

get_header();
// Get Value
$rainbow_options = Rainbow_Helper::rainbow_get_options();
$rainbow_portfolio_sidebar_class = ($rainbow_options['rainbow_project_archive_sidebar'] === 'no') || !is_active_sidebar('sidebar-1') ? 'col-lg-12 inbio-post-wrapper' : 'col-lg-8 inbio-post-wrapper';
?>
<!-- Start Blog Area  -->
<div class="portfolio-style-three rainbow-blog-area rn-section-gap">
    <div class="container">
        <div class="row row--40">
            <?php if (is_active_sidebar('sidebar-1') && $rainbow_options['rainbow_project_archive_sidebar'] == 'left') { ?>
                <div class="col-lg-4 col-xl-4 ">
                    <aside class="rainbow-sidebar-area"> 
                        <?php dynamic_sidebar(); ?> 
                    </aside>
                </div>
            <?php } ?>
            <div class="<?php echo esc_attr($rainbow_portfolio_sidebar_class); ?>">
                <div class="project-archive-wrapper">
                    <div class="row row--25">
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
                                get_template_part('template-parts/project/content');

                            endwhile;
                            ?>
                            <div class="col-12 mt--50"><?php
                                rainbow_blog_pagination();
                                ?></div> <?php

                        else :
                            get_template_part('template-parts/content', 'none');

                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <?php if (is_active_sidebar('sidebar-1') && $rainbow_options['rainbow_project_archive_sidebar'] == 'right') { ?>
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