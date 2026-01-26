<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inbio
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="rn-entry-content">
        <?php
        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'inbio'),
            'after' => '</div>',
        ));
        ?>
    </div>
</div>