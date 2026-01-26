<?php
/**
 * Template Name: Blank Template
 *
 * @package inbio
 */

?>
<div id="primary" class="fix-content-area ">
    <?php while (have_posts()) :
        the_post();
        the_content();
    endwhile; // End of the loop. ?>
</div>

