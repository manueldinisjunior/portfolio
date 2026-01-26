<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package inbio
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
 
/**
 * inbio_get_nav_menus
 */
if (!function_exists('rainbow_get_nav_menus')) {
    function rainbow_get_nav_menus()
    {

        $menus = wp_get_nav_menus();
        $menus_data = array(
            'default' => esc_html__('Default', 'inbio')
        );
        if (!empty($menus) && !is_wp_error($menus)) {
            foreach ($menus as $item) {
                $menus_data[$item->slug] = $item->name;
            }
        }
        return $menus_data;
    }
}
 

/**
 * @param $classes
 * @return array
 */
if (!function_exists('rainbow_body_classes')) {
    function rainbow_body_classes($classes)
    {

        $rainbow_options = Rainbow_Helper::rainbow_get_options();


        global $post;

        if (isset($post)) {
            $classes[] = $post->post_type . '-' . $post->post_name;
        }

        // Adds a class of hfeed to non-singular pages.
        if (is_singular()) {
            $classes[] = ' ';
        }


        // Run code only for Single post page
        if (is_single() && 'post' == get_post_type()) {
            $classes[] = ' ';
        }


        // Add class only for Single post page
        if ( is_single() && 'post' == get_post_type() ) {
            $classes[] = ($rainbow_options['rainbow_single_pos'] === 'full') || !is_active_sidebar('sidebar-1') ? 'no-sidebar' : 'with-sidebar';
        }

        // Add class only for Single project page
        if ( is_single() && 'rainbow_projects' == get_post_type() ) {
            $classes[] = ($rainbow_options['rainbow_single_project_pos'] === 'full') || !is_active_sidebar('sidebar-1') ? 'no-sidebar' : 'with-sidebar';
        }
    
        // $classes[] = 'spybody';

        if (class_exists('ACF')) {

            $templateclasses = rainbow_get_acf_data("field_template_color_opt");

            if (is_page()) {
                $classes[] = $templateclasses;
            } else {
                $classes[] = ' template-color-1';
            }

        } else {

            $classes[] = 'template-color-1';
        } 
        $header_layout = Rainbow_Helper::rainbow_header_layout();
        $header_transparent = $header_layout['header_transparent'];
        $header_sticky = $header_layout['header_sticky'];
        $classes[] = ("no" !== $header_sticky && "0" !== $header_sticky) ? " header-sticky" : " ";
        $classes[] = ("no" !== $header_transparent && "0" !== $header_transparent) ? " header--transparent " : " ";
        $classes[] = 'header-layout-' . $header_layout['header_style'];

        $active_dark_mode = '';
        if (class_exists('ACF')) {

            $active_dark_mode = rainbow_get_acf_data("rainbow_active_dark_mode");
            $rainbow_has_box = rainbow_get_acf_data("rainbow_has_box");


            $classes[] = $rainbow_has_box = (empty($rainbow_has_box)) ? $rainbow_options['active_box_wrapper'] : $rainbow_has_box;

            if ("yes" === $rainbow_has_box || "1" === $rainbow_has_box) {
                $classes[] = "  box-wrapper";
            }


            if ($rainbow_options['active_dark_mode'] == '1') {
                if ($active_dark_mode == 'white-version') {
                    $classes[] = ' white-version';
                    $classes[] = ' active_light_mode';
                } elseif ($active_dark_mode == 'dark-version') {
                    $classes[] = ' dark-version';
                    $classes[] = ' active_dark_mode';
                } else {
                    $classes[] = ' dark-version';
                    $classes[] = ' active_dark_mode';
                }
            } else {
                if ($active_dark_mode == 'white-version') {
                    $classes[] = ' white-version';
                    $classes[] = ' active_light_mode';
                } elseif ($active_dark_mode == 'dark-version') {
                    $classes[] = ' dark-version';
                    $classes[] = ' active_dark_mode';
                } else {
                    $classes[] = ' white-version';
                    $classes[] = ' active_light_mode';
                }
            }


        } else {
            if ($rainbow_options['active_dark_mode'] == '1') {
                $classes[] = ' white-version';
                $classes[] = ' active_light_mode';
            } else {
                $classes[] = ' dark-version';
                $classes[] = ' active_dark_mode';
            }


        }


        //  $classes[] = '" spy="scroll" data-spy="scroll" data-target=".navbar-example2" data-offset="70"';

        return $classes;
    }
}

add_filter('body_class', 'rainbow_body_classes', 999);

/**
 * @param $classes
 * @return string
 */
function rainbow_admin_body_classes($classes)
{
    global $post;
    if (isset($post)) {
        $classes .= ' ' . $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('admin_body_class', 'rainbow_admin_body_classes');


/**
 * Get unique ID.
 */
if (!function_exists('rainbow_unique_id')) {
    function rainbow_unique_id($prefix = '')
    {
        static $id_counter = 0;
        if (function_exists('wp_unique_id')) {
            return wp_unique_id($prefix);
        }
        return $prefix . (string)++$id_counter;
    }
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
if (!function_exists('rainbow_pingback_header')) {
    function rainbow_pingback_header()
    {
        if (is_singular() && pings_open()) {
            printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
        }
    }
}

add_action('wp_head', 'rainbow_pingback_header');

/**
 * Comment navigation
 */
if (!function_exists('rainbow_get_post_navigation')) {
    function rainbow_get_post_navigation()
    {
        if (get_comment_pages_count() > 1 && get_option('page_comments')):
            require(get_template_directory() . '/inc/comment-nav.php');
        endif;
    }
}

require get_template_directory() . '/inc/comment-form.php';