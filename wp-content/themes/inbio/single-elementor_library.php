<?php
/**
 * The template for displaying elementor template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package inbio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();
while (have_posts()) : the_post(); ?>
    <div class="page-wrapper blog-story-area clear rn-section-gap">
        <div class="elementor-template-preview">
            <?php the_content(); ?>
        </div>
    </div>
<?php
endwhile; // End of the loop.
get_footer();