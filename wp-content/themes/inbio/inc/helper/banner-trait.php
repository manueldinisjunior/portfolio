<?php

/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */
trait rainbowBannerTrait
{


    /** layout settings */
    public static function rainbow_layout_settings()
    {


        if (is_single() || is_page()) {
            $post_type = get_post_type();

            switch ($post_type) {
                case 'page':
                    $themepfix = 'page';
                break; 
                default:
                    $themepfix = 'page';
                break;
            }
        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            if (is_author()) {
                $themepfix = 'blog';
            } elseif (is_search()) {
                $themepfix = 'blog';
            } elseif (is_post_type_archive("rainbow_projects") || is_tax("rainbow_projects_category")) {
                $themepfix = 'project_archive'; 
            } elseif (is_post_type_archive("product") || is_tax("product_cat")) {
                $themepfix = 'shop';
            } else {
                $themepfix = 'blog';
            }
        }
        return $themepfix;
    }

    /** layout settings */
    public static function rainbow_layout_settings_single()
    {


        if (is_single() || is_page()) {
            $post_type = get_post_type();

            switch ($post_type) {
                case 'page':
                    $themepfix = 'page';
                break;
                case 'post':
                    $themepfix = 'single_post';
                break;      
                case 'product':
                    $themepfix = 'products'; 
                break;     
                case 'rainbow_projects':
                    $themepfix = 'single_project';
                break;
                default:
                    $themepfix = 'single_post';
                break;
            }
        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            if (is_author()) {
                $themepfix = 'blog';
            } elseif (is_search()) {
                $themepfix = 'blog';
            } elseif (is_post_type_archive("rainbow_projects") || is_tax("rainbow_projects_category")) {
                $themepfix = 'project_archive'; 
            } elseif (is_post_type_archive("product") || is_tax("product_cat")) {
                $themepfix = 'shop';
            } else {
                $themepfix = 'blog';
            }
        }
        return $themepfix;
    }


    /**
     * @return array
     * Banner Layout
     */
    public static function rainbow_banner_layout()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();

        $condipfix = self::rainbow_layout_settings();

        $banner_area = rainbow_get_acf_data('rainbow_title_wrapper_show');


        $banner_area = (!empty($banner_area)) ? $banner_area : $rainbow_options['rainbow_' . $condipfix . '_banner_enable'];


        $banner_layout = [
            'banner_area' => $banner_area,

        ];

        return $banner_layout;

    }


    /**
     * @return array
     * Banner Layout
     */
    public static function rainbow_page_breadcrumb()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();
        /**
         * Get Page Options value
         */
        $breadcrumbs = rainbow_get_acf_data('rainbow_breadcrumbs_enable');
        $condipfix = self::rainbow_layout_settings();

        /**
         * Set Condition
         */
        $breadcrumbs = (!empty($breadcrumbs)) ? $breadcrumbs : $rainbow_options['rainbow_' . $condipfix . '_breadcrumb_enable'];

        /**
         * Load Value
         */
        $breadcrumbs_enable = [
            'breadcrumbs' => $breadcrumbs,
        ];
        return $breadcrumbs_enable;

    }   

    /**
     * @return array
     * Banner Layout
     */
    public static function rainbow_page_breadcrumb_single()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();
        /**
         * Get Page Options value
         */
       
        $condipfix = self::rainbow_layout_settings_single();

        /**
         * Set Condition
         */
        $breadcrumbs = $rainbow_options['rainbow_' . $condipfix . '_breadcrumb_enable'];

        /**
         * Load Value
         */
        $breadcrumbs_enable = [
            'breadcrumbs' => $breadcrumbs,
        ];
        return $breadcrumbs_enable;

    }

}
