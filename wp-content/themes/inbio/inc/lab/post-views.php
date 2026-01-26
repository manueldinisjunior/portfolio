<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!class_exists('Rainbow_Post_Views')) {
    class Rainbow_Post_Views
    {

        /**
         * __construct
         *
         * Class constructor where we will call our filter and action hooks.
         */
        function __construct()
        {

            add_filter('manage_posts_columns', array($this, 'rainbow_posts_column_views'));
            // add_action( 'manage_posts_custom_column',        array( $this, '_posts_custom_column_views' ), 5, 2 );

            add_action('wp_footer', array($this, 'rainbow_set_post_views'));
        }

        /**
         * rainbow_set_post_views
         *
         * Count number of views
         */
        function rainbow_set_post_views()
        {
            $rainbow_options = Rainbow_Helper::rainbow_get_options();
            # Run only if the post views option is set to THEME's post views module
            if (!$rainbow_options['rainbow_show_post_view'] || !is_single()) {
                return;
            }

            # Run only on the first page of the post
            $page = get_query_var('paged', 1);

            if (!$rainbow_options['rainbow_show_post_view'] || $page > 1) {
                return false;
            }

            # Increase number of views +1
            $count = 0;
            $post_id = get_the_ID();
            $count_key = 'rainbow_views';
            $count = (int)get_post_meta($post_id, $count_key, true);
            $new_count = $count + 1;

            update_post_meta($post_id, $count_key, (int)$new_count);

        }

        /**
         * _posts_column_views
         *
         * Dashboared column title
         */
        function rainbow_posts_column_views($defaults)
        {
            $rainbow_options = Rainbow_Helper::rainbow_get_options();
            if ($rainbow_options['rainbow_show_post_view']) {
                $defaults['rainbow_post_view'] = esc_html__('Views', 'inbio');
            }

            return $defaults;
        }

        /**
         * _posts_custom_column_views
         *
         * Dashboared column content
         */
        function _posts_custom_column_views($column_name, $id)
        {
            if ($column_name === 'rainbow_post_view') {
                echo rainbow_views('', get_the_ID());
            }
        }
    }

    # Instantiate the class
    new Rainbow_Post_Views();

}


/*-----------------------------*/
# Display number of views
/*-----------------------------*/


if (!function_exists('Rainbow_Post_Views_number')) {
    function Rainbow_Post_Views_number($text = '', $post_id = 0)
    {

        if (empty($post_id)) {
            $post_id = get_the_ID();
        }

        $views_class = '';
        $formated = 0;
        $count_key = 'rainbow_views';
        $view_count = get_post_meta($post_id, $count_key, true);
        if (!empty($view_count)) {
            $formated = number_format_i18n($view_count);
            if ($view_count > 1000) {
                $views_class = 'very-high';
            } elseif ($view_count > 100) {
                $views_class = 'high';
            } elseif ($view_count > 5) {
                $views_class = 'rising';
            }
        } else if ($formated == '') {
            $formated = 0;
        }
        return '<span class="post-meta-view  ' . $views_class . '">' . $formated . ' ' . $text . '</span> ';
    }
}
