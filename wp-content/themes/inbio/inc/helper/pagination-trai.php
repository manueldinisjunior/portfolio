<?php

/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */

trait rainbowPaginationTrait
{

    public static function rainbow_pagination($max_num_pages = false)
    {
        global $wp_query;

        $max = $max_num_pages ? $max_num_pages : $wp_query->max_num_pages;
        $max = intval($max);

        /** Stop execution if there's only 1 page */
        if ($max <= 1) return;

        $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

        /**    Add current page to the array */
        if ($paged >= 1)
            $links[] = $paged;

        /**    Add the pages around the current page to the array */
        if ($paged >= 3) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }

        if (($paged + 2) <= $max) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }
        include RAINBOW_DIRECTORY_VIEW . 'pagination.php';
    }

}
