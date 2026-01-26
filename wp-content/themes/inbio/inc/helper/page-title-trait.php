<?php

/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */

trait rainbowPageTitleTrait
{
  // Page title
    public static function rainbow_get_page_title()
    {

        $rainbow_options = Rainbow_Helper::rainbow_get_options();
        
        if (is_404()) {
            $rainbow_title = 'error_title';
        } elseif (is_search()) {
            $rainbow_title = esc_html__('Search Results for : ', 'inbio') . get_search_query();
        } elseif (is_home()) {
            if (get_option('page_for_posts')) {
                $rainbow_title = get_the_title(get_option('page_for_posts'));
            } else {
                $rainbow_title = apply_filters("rainbow_blog_title", esc_html__('All Posts', 'inbio'));
            }
        } elseif (is_archive()) {

            if (is_post_type_archive("rainbow_projects")) {

                
                $rainbow_title = get_the_archive_title();
            } else {
                $rainbow_title = get_the_archive_title();
            }
        } elseif (is_single()) { 
               
              $rainbow_title = '';
            
            


        } else {
            $rainbow_title = get_the_title();
        }
        return $rainbow_title;
    }

}
