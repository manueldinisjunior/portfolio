<?php
/**
 * Template Name: Side Navs Page
 *
 * @package inbio
 */

?>
<?php get_header(); ?>
    <div class="wrapper-two">
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
<?php
get_footer();